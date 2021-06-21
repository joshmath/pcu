<template>
	<transition name="fade">
		<div class="character-viewer" v-show="selected" @click="close">
			<div class="background-overlay"></div>
			<div class="character-wrapper" ref="characterWrapper">
				<div class="character-image" ref="characterImage">
					<img :src="selected_character.main_image" :alt="selected_character.name">
					<span ref="imageCover"></span>
				</div>
				<div class="character-info" ref="characterInfo">
					<div class="character-bg"><img :src="selected_character.background_image" ref="characterBg" alt=""></div>
					<div class="character-name" ref="characterName">{{ selected_character.name }}</div>
					<div class="border" ref="border"></div>
					<div class="character-affiliation" ref="affiliation">{{ selected_character.affiliation }}</div>
					<div class="character-primitive" ref="primitive">{{ selected_character.primitive }}</div>
					<div class="character-desc" ref="desc">{{ selected_character.desc }}</div>
				</div>
			</div>
		</div>
	</transition>
</template>

<script>
	import { gsap } from 'gsap';
	// import { CSSRulePlugin } from "gsap/CSSRulePlugin.js";
	// gsap.registerPlugin(CSSRulePlugin);
	export default {
		props: {
			character: {
				type: String
			}
		},
		data() {
			return {
				timeline: '',
				selected: false,
				selected_name: null,
				selected_character: {},
				characters: [
					{
						name: 'The Falcon',
						affiliation: 'Avengers',
						primitive: 'Elie Andraos',
						desc: 'Does the stuff we don\'t want to do (javascript) while making it look cool.',
						main_image: 'assets/images/falcon-large@2x.jpg',
						background_image: 'assets/images/falcon-background@2x.jpg',
						color: '#7B1113'
					},
					{
						name: 'Iron Man',
						affiliation: 'Avengers',
						primitive: 'Jerred Hurst',
						desc: 'Plays with well with technology, emotionally unavailable.',
						main_image: 'assets/images/iron-man-large@2x.jpg',
						background_image: 'assets/images/iron-man-background@2x.jpg',
						color: '#FBCA02'
					},
					{
						name: 'The Hulk',
						affiliation: 'Avengers',
						primitive: 'Leisa Redmon',
						desc: 'Hella strong, super smart, super quiet.',
						main_image: 'assets/images/hulk-large@2x.jpg',
						background_image: 'assets/images/hulk-background@2x.jpg',
						color: '#70964B'
					},					
					{
						name: 'Star Lord',
						affiliation: 'Guardians of the Galaxy',
						primitive: 'Jeter Cotton',
						desc: 'Super hip, fearless leader of the web team.',
						main_image: 'assets/images/starlord-large@2x.jpg',
						background_image: 'assets/images/starlord-background@2x.jpg',
						color: '#FF0000'
					},					
					{
						name: 'Captain America',
						affiliation: 'Avengers',
						primitive: 'Kade Wilcox',
						desc: 'Fearless leader, pump up speeches, that kind of thing.',
						main_image: 'assets/images/captain-large@2x.jpg',
						background_image: 'assets/images/captain-background@2x.jpg',
						color: '#3593D7'
					},					
					{
						name: 'Captain Marvel',
						affiliation: 'Avengers',
						primitive: 'Annie Gilbert',
						desc: 'Shows up at the right time and gets the job done.',
						main_image: 'assets/images/captain-marvel-large@2x.jpg',
						background_image: 'assets/images/captain-marvei-background@2x.jpg',
						color: '#EED238'
					},					
					{
						name: 'Nick Fury',
						affiliation: 'Avengers',
						primitive: 'Tanner Dean',
						desc: 'Doing his best to keep us developers somewhat in line.',
						main_image: 'assets/images/nick-fury-large@2x.jpg',
						background_image: 'assets/images/nick-fury-background@2x.jpg',
						color: '#A5A5A5'
					},										
					{
						name: 'Spider-man',
						affiliation: 'Avengers',
						primitive: 'Richard Bagshaw',
						desc: 'Newest Avenger, trying his hardest to get up to speed.',
						main_image: 'assets/images/spider-man-large@2x.jpg',
						background_image: 'assets/images/spider-man-background@2x.jpg',
						color: '#E4141A'
					},										
					{
						name: 'Hawkeye',
						affiliation: 'Avengers',
						primitive: 'Aaron Carlisle',
						desc: 'Mostly silent, effective, 👍',
						main_image: 'assets/images/hawkeye-large@2x.jpg',
						background_image: 'assets/images/hawkeye-background@2x.jpg',
						color: '#754E95'
					},										
					{
						name: 'Shuri',
						affiliation: 'Wakanda',
						primitive: 'Larae Hurley',
						desc: 'Quietly designing great things, and hip.',
						main_image: 'assets/images/shuri-large@2x.jpg',
						background_image: 'assets/images/shuri-background@2x.jpg',
						color: '#4F2784',						
					},										
					{
						name: 'Loki',
						affiliation: 'Asgard',
						primitive: 'Matthew James',
						desc: 'Enjoys causing chaos.',
						main_image: 'assets/images/loki-large@2x.jpg',
						background_image: 'assets/images/loki-background@2x.jpg',
						color: '#377831',						
					},										
					{
						name: 'Heimdall',
						affiliation: 'Asgard',
						primitive: 'Molly Fisher',
						desc: 'Keeps Madera at bay so we can accomplish something…before the requirements change (again)',
						main_image: 'assets/images/heimdall-large@2x.jpg',
						background_image: 'assets/images/heimdall-background@2x.jpg',
						color: '#D1AC67',						
					},										
					{
						name: 'Dr. Strange',
						affiliation: 'Illuminati',
						primitive: 'Dillon Clift',
						desc: 'Masters the mystic arts…like the Python programming language.',
						main_image: 'assets/images/dr-strange-large@2x.jpg',
						background_image: 'assets/images/dr-strange-background@2x.jpg',
						color: '#004189',						
					},										
					{
						name: 'War Machine',
						affiliation: 'Stark Industries',
						primitive: 'Jeremy Giovannetti',
						desc: 'Quiet, dependable, built like a tank.',
						main_image: 'assets/images/war-machine-large@2x.jpg',
						background_image: 'assets/images/war-machine-background@2x.jpg',
						color: '#A39F9D',						
					},										
					{
						name: 'Ant-Man',
						affiliation: 'Avengers',
						primitive: 'Parker Brown',
						desc: 'Tries hard, gets back up when knocked down (swiped left on), overall I respect it.',
						main_image: 'assets/images/antman-large@2x.jpg',
						background_image: 'assets/images/antman-background@2x.jpg',
						color: '#C2272A',						
					},										
					{
						name: 'Wasp',
						affiliation: 'Avengers',
						primitive: 'Kenley Jones',
						desc: 'Keeps Parker, and her team, in line.',
						main_image: 'assets/images/wasp-large@2x.jpg',
						background_image: 'assets/images/wasp-background@2x.jpg',
						color: '#FFA500',						
					},										
					{
						name: 'Okoye',
						affiliation: 'Dora Milaje',
						primitive: 'Meagan Martin',
						desc: 'Spreads the word of Primitive around Lubbock, like the Dora Milaje do for Wakanda.',
						main_image: 'assets/images/okoye-large@2x.jpg',
						background_image: 'assets/images/okoye-background@2x.jpg',
						color: '#A24140',						
					},										
					{
						name: 'Valkyrie',
						affiliation: 'Asgard',
						primitive: 'Josh Mathis',
						desc: 'Reluctant to get involved, but a solid asset once they join up.',
						main_image: 'assets/images/valkyrie-large@2x.jpg',
						background_image: 'assets/images/valkyrie-background@2x.jpg',
						color: '#0F61BB',						
					},										
					{
						name: 'Drax',
						affiliation: 'Guardians of the Galaxy',
						primitive: 'Michael Goldberg',
						desc: 'Lurks incredibly still the shadows of Slack, but gets the job done when needed.',
						main_image: 'assets/images/drax-large@2x.jpg',
						background_image: 'assets/images/drax-background@2x.jpg',
						color: '#CC1A1E',						
					},										
					{
						name: 'Rocket',
						affiliation: 'Guardians of the Galaxy',
						primitive: 'Hunter Bullock',
						desc: 'Always playing with new and fun gadgets, and good to have around.',
						main_image: 'assets/images/rocket-large@2x.jpg',
						background_image: 'assets/images/rocket-background@2x.jpg',
						color: '#C25629',						
					},										
					{
						name: 'Groot',
						affiliation: 'Guardians of the Galaxy',
						primitive: 'Brooke Barnes',
						desc: 'I imagine you are saing the same three words to your newborn kid so this kind of works?',
						main_image: 'assets/images/groot-large@2x.jpg',
						background_image: 'assets/images/rocket-background@2x.jpg',
						color: '#906D3E',						
					},										
					{
						name: 'Scarlet Witch',
						affiliation: 'Avengers',
						primitive: 'Liz Langford',
						desc: 'Super powerful office mom.',
						main_image: 'assets/images/wanda-large@2x.jpg',
						background_image: 'assets/images/wanda-background@2x.jpg',
						color: '#AE0C25',						
					},										
					{
						name: 'Winter Soldier',
						affiliation: 'Avengers',
						primitive: 'Sydney Spiegal',
						desc: 'The person that will ride or die with you and then tell you it was a bad idea.',
						main_image: 'assets/images/bucky-large@2x.jpg',
						background_image: 'assets/images/bucky-background@2x.jpg',
						color: '#A6A5AD',						
					},										
					{
						name: 'Thor',
						affiliation: 'Avengers',
						primitive: 'Lacey Wilcox',
						desc: 'Lacey really likes Thor, and I really like having a job/paycheck so she gets what she wants.',
						main_image: 'assets/images/thor-large@2x.jpg',
						background_image: 'assets/images/thor-background@2x.jpg',
						color: '#BC1624',						
					},										
					{
						name: 'Black Panther',
						affiliation: 'Wakanda',
						primitive: 'Danielle Holmes',
						desc: 'Kind of secretive, hiding away in Florida working on making our grammar gooder (it\'s a word now).',
						main_image: 'assets/images/panther-large@2x.jpg',
						background_image: 'assets/images/panther-background@2x.jpg',
						color: '#2c2c2c',						
					},										
					{
						name: 'Gamora',
						affiliation: 'Guardians of the Galaxy',
						primitive: 'Heather Huegi',
						desc: 'Fearlessly leading the marketing team.',
						main_image: 'assets/images/gamora-large@2x.jpg',
						background_image: 'assets/images/gamora-background@2x.jpg',
						color: '#BE0065',						
					},										
					{
						name: 'Vision',
						affiliation: 'Avengers',
						primitive: 'Jessica Hicks',
						desc: 'Because you are laying a vision for our future (that was clever).',
						main_image: 'assets/images/vision-large@2x.jpg',
						background_image: 'assets/images/vision-background@2x.jpg',
						color: '#EDC759',						
					},										
					{
						name: 'Deadpool',
						affiliation: 'X-Force',
						primitive: 'Matt Trask',
						desc: 'Realist, wont hold back, swears at the code he is writing.',
						main_image: 'assets/images/deadpool-large@2x.jpg',
						background_image: 'assets/images/deadpool-background@2x.jpg',
						color: '#E90012',						
					}
				]
			}
		},
		mounted() {				
			
			this.selected_character = this.characters[0];

			var wrapper = this.$refs.characterWrapper;
			var mainImage = this.$refs.characterImage;
			var infoWrapper = this.$refs.characterInfo;
			var name = this.$refs.characterName;
			var affiliation = this.$refs.affiliation;
			var primitive = this.$refs.primitive;
			var desc = this.$refs.desc;
			var border = this.$refs.border;
			var imageCover = this.$refs.imageCover;
			var characterBg = this.$refs.characterBg;

			gsap.set(wrapper, { xPercent: -100 })
			gsap.set(affiliation, { "clip-path": "polygon(0 0, 100% 0, 100% 0, 0 0)" })
			gsap.set(border, { "clip-path": "polygon(0 0, 0 0, 0 100%, 0% 100%)" })
			gsap.set(mainImage, { "clip-path": "polygon(0 0, 100% 0, 100% 0, 0 0)" })
			gsap.set(imageCover, { "clip-path": "polygon(0 100%, 100% 100%, 100% 0, 0 0)" })
			gsap.set(characterBg, { autoAlpha: 0 })

			this.timeline = gsap.timeline({ paused: true })

			this.timeline.to(wrapper, { duration: .625, ease: "circ.inOut", xPercent: 0 }, "+=.5")
				.to(mainImage, { duration: .5, ease: "circ.inOut", "clip-path": "polygon(0 0, 100% 0, 100% 100%, 0 100%)" })
				.to(imageCover, { duration: .5, ease: "circ.inOut", "clip-path": "polygon(0 100%, 100% 100%, 100% 100%, 0 100%)" })
				.from(name, {duration: .2, autoAlpha: 0, xPercent: -2 }, "-=.375")
				.to(characterBg, {duration: .5, autoAlpha: 1}, "-=.5")
				.to(border, {duration: .5, ease: "circ.inOut", "clip-path": "polygon(100% 0, 0 0, 0 100%, 100% 100%)" }, "-=.25")
				.to(affiliation, {duration: .5, "clip-path": "polygon(0 0, 100% 0, 100% 100%, 0 100%)"}, "-=.1")
				.from(primitive, { duration: .5, autoAlpha: 0, y:5 }, "+=.15")
				.from(desc, { duration: .5, autoAlpha: 0, y: 5 }, "-=.05");


			Event.$on('select-character', character => {
				
				let n = character;

				this.selected_character = this.characters.find(item => item.name == n);				
				
				document.querySelector('.character-wrapper').style.setProperty('--characterColor', this.selected_character.color);
				this.selected = true;
				this.timeline.play();
								
			})

			Event.$on('close-character', character => {				

				this.selected = false;
				this.timeline.restart().pause();
								
			})
		},
		methods: {			
			close() {
				Event.$emit('close-character')
			}
		}
	}
</script>
<style scoped>
.fade-enter-active, .fade-leave-active {
  transition: opacity 1s;
}
.fade-enter, .fade-leave-to {
  opacity: 0;
}
</style>

<style lang="scss" scoped>
.character-bg{
	position: absolute;
	top: 0;
	left: 0;
	z-index: -1;
	width: 100%;
	height: 100%;
	overflow: hidden;
	mix-blend-mode: hard-light;
    filter: opacity(0.2);	
	img{
		object-fit: cover;
		object-position: 90% top;
		width: 100%;
		height: 100%;
	}
}

.border{
	width: 100%;
	height: 1px;
	display:block;
	border-bottom: 1px solid #fff;
	margin: .75rem 0;
}
</style>