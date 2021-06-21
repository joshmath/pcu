lazy:
	npm run prod
	cd build_production && zip -r Archive.zip .
	mv ./build_production/Archive.zip .