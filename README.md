# PS Static Website Template
This is combination of the static site generator (Jigsaw by Tighten) and custom boiler plate setup by Primitive Social.

#### 🔨 Install
After cloning this repo, open up terminal and:
```
$ cd my-project-directory

$ npm install

$ composer install
```

**NOTE:** If you are using this for another project and have cloned the repo, remove the `.git` folder before pushing it, as that will overwrite everything.

---

#### 💻Running Locally
To develop and test locally, the process is really simple.  From terminal in the project directory:

```
$ npm run watch
```

This will compile the asset files and launch a BrowserSync session at `localhost:3000`.  It also supports `hot reload` so anytime you make a change to any of the files, you browser will auto refresh.

---

#### 📁Directory Structure
The important sections of the project are listed below:
<br /><br />

**Layout File** - `source/_layouts/master.blade.php`

Think of this as your master template.  This is a good place to include your header and footer.  It will render all of the other pages content where the `@yield('body')` tag is.  

Things to do with this file:
 * Update all meta tags, open graph tags, etc (all in the `head` section of this file)
 * Add Google Analytics in the head section
 * Add any libraries such as Font Awesome, Google Fonts, etc in the `head` section
 * Add any external JS libraries at the bottom of the `body` section
 * Add any header and footer code that is used throughout the site
 <br /><br />
 
**Pages** - `source/`

All page files should go in this directory.  You will see the default template `index.blade.php` already exists there.

Things to note about pages:
 * They must be named properly with `.blade.php` as the extension.  
 * The url for the page will be the text before `.blade.php`.  So, the url for `jerreds-page.blade.php` is `/jerreds-page`
 * They must include the `@extends`,`@section`,`@endsection` tags
 * All content between the `@section('body')` and `@endsection` will be displayed
 <br /><br />
 
**Images and Other Files** - `source/assets/`

You will store all of the files that need to be referenced publicy in this directory.

To reference these files in your page templates, the path is: `/assets/images/logo.png`
<br /><br />

**CSS** - `source/_assets/sass/main.scss`

This is a SASS file and will be compiled when you build the project.  It already includes a reset/normalize file, so you will not need that.
<br /><br />

**JS** - `source/_assets/js/main.js`

This is a standard javascript file that will be compiled within when you build your project.

---

#### 🚀 Deploy to Server
Please follow both steps:

**Step 1** From terminal in the project directory:

```
$ npm run production
```

This will compile the asset files into a `build_production` directory.
<br /><br />

**Step 2** From terminal in the project directory:

IMPORTANT: You must have the following 3 items set in the `deploy.js` file in the root directory:

 * FTP Username `user:`
 * FTP Password `password:`
 * FTP Host `host:`

By default, it will copy everything from your `build_production` to the `public_html` directory of the domain.  If you need it setup differently, you will also need to edit this line in `deploy.js`

 * `remoteRoot: '/public_html/',`

```
$ npm run deploy
```

_Alternate Method:_ You can just as easily (well not quite as easily) copy all the contents from the `build_production` to the `public_html` on the web server with the FTP client of your choice.

#### Import Docs

[Jigsaw Docs](https://jigsaw.tighten.co/docs)

[Blade Docs](https://laravel.com/docs/5.8/blade)