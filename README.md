# www.FixStream.com
Development source and WordPress build for www.FixStream.com. No manual updates should be made to the /wordpress directory- all compiled in /development. We generate a unique CSS file for each page (using modular Sass imports) to minimize HTTP requests.

**TODO**: Add .nvmrc (built using v8.11.3)

---

## Development
Handle static page data and content using Handlebars + Sass + vanilla JS. Builds to wordpress/wp-content/themes/fixstream

`gulp audit`: Creates record of all existing page-specific source files (HBS/JS/SCSS) within the development environment. Exports to a temp folder as an array in a JSON object. This is fed into `gulp pages` for comparision with site-data.json. Useful for keep source files unpolluted.

`gulp pages`: Parses through site-data.json and generates a default HBS, SCSS, and JS file for each page name. Compares against `gulp audit` file list and outputs a list of unassociated source files for review/deletion. Convenient for keeping source files in line with data.

### Page Data Config
Object key: Data Key for Handlebars - must start with a letter

`name`: Generated filename for built JS/CSS

`type`: **OPTIONAL:** Typically omitted; Used with a value of "wp-template" when integrating into WP template hierarchy (i.e. post templates, 404 page)

`nav`: **OPTIONAL:** If included, page will be added to global nav with this text label; Nav order based on JSON

`uniqueJS`: **OPTIONAL:** If included, `gulp pages` will generate a JS source file for page-specific scripting. Also directs HBS to include specific JS reference in page template.

`slug`: Page-level URL; Nested pages handled by object nesting

`hero`: **OPTIONAL:** Includes hero template; H1 (required) will automatically be placed inside hero

`hero.intro`: **OPTIONAL:** Hero subheader

`hero.cta`: **OPTIONAL:** Hero CTA

`subpages`: **OPTIONAL:** Nested subpages; follows the same structure as parent

Example Page Object:
```
"platform": {
	"name": "platform",
	"nav": "Platform",
	"uniqueJS": true,
	"slug": "platform",
	"meta": {
		"title": "Platform",
		"description": "Lorem ipsum dolor sit amet.",
		"og-title": "test og title",
		"twitter-title": "test twitter title"
	},
	"h1": "Platform Capabilities",
	"hero" : {
		"intro": "Powerful Insights with Every Click.",
		"cta": {
			"value": "Get in touch",
			"meta": {
				"url": "/company"
			}
		}
	},
	"subpages": {
		"agent-less-auto-discovery": {
			"name": "agent-less-auto-discovery",
			"nav": "Agent-less Auto Discovery",
			"slug": "agent-less-auto-discovery",
			"meta": {
				"title": "Agent-less Auto Discovery",
				"description": "Lorem ipsum dolor sit amet.",
				"og-title": "test og title",
				"twitter-title": "test twitter title"
			},
			"h1": "Auto-Discovery",
			"hero" : {
				"intro": "Lorem ipsum dolor sit amet consectetur adipiscing elit sodales"
			}
		}
	}
}
```

---


`gulp theme`: Generates style.css from theme data in site-data.json (registers theme for WP admin to find). Builds to theme root.

`gulp images`: Basically just takes images in development and duplicates/moves to built (WordPress theme).

`gulp fonts`: Basically just takes fonts in development and duplicates/moves to built (WordPress theme).

`gulp assets`: Runs `gulp images` and `gulp fonts`.


`gulp hbs`: Comples HBS from site-data.json as well as content within HBS templates. This also builds required functions.php. **_Content is not fully separated from source._**. Builds to theme root. Can be watched with `gulp hbs:watch`


`gulp css`: Compiles and minifies SCSS. Builds to theme's /css directory. Can be watched with `gulp css:watch`


`gulp js`: Bundles/concatinates modules, minifies and transpiles with webpack and builds to the WordPress theme. Can be watched with `gulp js:watch`


`gulp build`: Runs `gulp hbs` `gulp assets` `gulp css` `gulp js` `gulp theme`


`gulp`: Default `gulp build`


`gulp clean`: Dumps the entire theme folder

---

## WordPress
In addition to the theme itself, repo holds WordPress core as well as plugins and media files. This includes uploaded content from the CMS (wordpress/wp-content/uploads) as well as theme images. Updates to core/plugins should be done locally, tested, and then committed/deployed. Image uploads to Production will need to be committed to this repo (manually?). **Do not modify wp-config.php** (included in .gitignore).

**TODO:** Looking to develop a utility to pull-from and push-to individual databased. i.e. sync localhost database with current Production database for rapid development.


WordPress is integrated for blogging as well as custom post types including:
* Resources
	* Whitepapers
	* Case Studies
	* Tech Docs
	* Videos
* Team Profiles
	* Leadership
	* Board
	* Employees
* News Items
	* External Links
	* Press Releases
* Private Job Posts
* **TODO:** Events (conference/booth etc)