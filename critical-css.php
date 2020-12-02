<style id="criticalcss" type="text/css">
body {
  position: relative;
  margin: 0;
  padding: 0;
  background: #f1f5f8;
  color: #000000;
  font-size: 18px;
  font-family: 'latoregular', arial, sans-serif;
  font-weight: 300;
}

form,
fieldset {
  margin: 0;
  padding: 0;
  border-width: 0;
}

input,
select,
textarea {
  font-family: arial, serif;
  font-size: 12px;
  color: black;
  resize: none;
}

input:focus,
select:focus,
textarea:focus {
  outline: none;
}

@font-face {
  font-family: 'latoblack';
  src: url(/akademia/wp-content/themes/mfind/fonts/lato/lato-black-webfont.eot);
  src: url(/akademia/wp-content/themes/mfind/fonts/lato/lato-black-webfont.eot?#iefix) format('embedded-opentype'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-black-webfont.woff2) format('woff2'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-black-webfont.woff) format('woff'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-black-webfont.ttf) format('truetype'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-black-webfont.svg#latoblack) format('svg');
  font-weight: 400;
  font-style: normal
}

@font-face {
  font-family: 'latobold';
  src: url(/akademia/wp-content/themes/mfind/fonts/lato/lato-bold-webfont.eot);
  src: url(/akademia/wp-content/themes/mfind/fonts/lato/lato-bold-webfont.eot?#iefix) format('embedded-opentype'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-bold-webfont.woff2) format('woff2'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-bold-webfont.woff) format('woff'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-bold-webfont.ttf) format('truetype'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-bold-webfont.svg#latobold) format('svg');
  font-weight: 400;
  font-style: normal
}

@font-face {
  font-family: 'latomedium';
  src: url(/akademia/wp-content/themes/mfind/fonts/lato/lato-medium-webfont.eot);
  src: url(/akademia/wp-content/themes/mfind/fonts/lato/lato-medium-webfont.eot?#iefix) format('embedded-opentype'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-medium-webfont.woff2) format('woff2'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-medium-webfont.woff) format('woff'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-medium-webfont.ttf) format('truetype'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-medium-webfont.svg#latomedium) format('svg');
  font-weight: 400;
  font-style: normal
}

@font-face {
  font-family: 'latoregular';
  src: url(/akademia/wp-content/themes/mfind/fonts/lato/lato-regular-webfont.eot);
  src: url(/akademia/wp-content/themes/mfind/fonts/lato/lato-regular-webfont.eot?#iefix) format('embedded-opentype'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-regular-webfont.woff2) format('woff2'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-regular-webfont.woff) format('woff'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-regular-webfont.ttf) format('truetype'), url(/akademia/wp-content/themes/mfind/fonts/lato/lato-regular-webfont.svg#latoregular) format('svg');
  font-weight: 400;
  font-style: normal
}

/* fix FontAwesome font for wp-discuz */
@font-face {
  font-family: Font Awesome\ 5 Brands;
  font-style: normal;
  font-weight: 400;
  src: url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-brands-400.eot);
  src: url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-brands-400.eot?#iefix) format("embedded-opentype"), url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-brands-400.woff2) format("woff2"), url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-brands-400.woff) format("woff"), url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-brands-400.ttf) format("truetype"), url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-brands-400.svg#fontawesome) format("svg")
}

@font-face {
  font-family: Font Awesome\ 5 Free;
  font-style: normal;
  font-weight: 400;
  src: url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-regular-400.eot);
  src: url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-regular-400.eot?#iefix) format("embedded-opentype"), url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-regular-400.woff2) format("woff2"), url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-regular-400.woff) format("woff"), url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-regular-400.ttf) format("truetype"), url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-regular-400.svg#fontawesome) format("svg")
}

@font-face {
  font-family: Font Awesome\ 5 Free;
  font-style: normal;
  font-weight: 900;
  src: url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-solid-900.eot);
  src: url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-solid-900.eot?#iefix) format("embedded-opentype"), url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-solid-900.woff2) format("woff2"), url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-solid-900.woff) format("woff"), url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-solid-900.ttf) format("truetype"), url(/akademia/wp-content/plugins/wpdiscuz/assets/third-party/font-awesome-5.0.6/webfonts/fa-solid-900.svg#fontawesome) format("svg")
}

@font-face {
  font-family: 'FontAwesome';
  src: url(/akademia/wp-content/themes/mfind/fonts/fontawesome-webfont.eot?v=4.0.3);
  src: url(/akademia/wp-content/themes/mfind/fonts/fontawesome-webfont.eot?#iefix&v=4.0.3) format('embedded-opentype'), url(/akademia/wp-content/themes/mfind/fonts/fontawesome-webfont.woff?v=4.0.3) format('woff'), url(/akademia/wp-content/themes/mfind/fonts/fontawesome-webfont.ttf?v=4.0.3) format('truetype'), url(/akademia/wp-content/themes/mfind/fonts/fontawesome-webfont.svg?v=4.0.3#fontawesomeregular) format('svg');
  font-weight: 400;
  font-style: normal
}
@font-face {
  font-family: 'akademia_sections';
  src:  url('/akademia/wp-content/themes/mfind/fonts/akademia_sections/akademia_sections.eot?bgapag');
  src:  url('/akademia/wp-content/themes/mfind/fonts/akademia_sections/akademia_sections.eot?bgapag#iefix') format('embedded-opentype'),
    url('/akademia/wp-content/themes/mfind/fonts/akademia_sections/akademia_sections.ttf?bgapag') format('truetype'),
    url('/akademia/wp-content/themes/mfind/fonts/akademia_sections/akademia_sections.woff?bgapag') format('woff'),
    url('/akademia/wp-content/themes/mfind/fonts/akademia_sections/akademia_sections.svg?bgapag#akademia_sections') format('svg');
  font-weight: normal;
  font-style: normal;
}

[class^="icon-"], [class*=" icon-"] {
  /* use !important to prevent issues with browser extensions that change fonts */
  font-family: 'akademia_sections' !important;
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;

  /* Better Font Rendering =========== */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

[class^="icon-academy-sections-"] {
  color: #fff;
}

.icon-academy-sections-travel:before {
  content: "\e900";
}

.icon-academy-sections-all:before {
  content: "\e901";
}

.icon-academy-sections-car:before {
  content: "\e902";
}

.icon-academy-sections-health:before {
  content: "\e903";
}

.icon-academy-sections-home:before {
  content: "\e904";
}

.icon-academy-sections-sponsored:before {
  content: "\e905";
}

a {
  color: #000000;
  text-decoration: none;
}

a img {
  border-width: 0;
}

button:focus {
  outline: 0;
}

.none {
  display: none;
}

.columns {
  width: 100%;
  overflow: hidden;
}

.clear {
  clear: both;
}

* {
  margin-top: 0;
  margin-bottom: 0;
  -webkit-text-size-adjust: none;
  text-size-adjust: none;
  -moz-text-size-adjust: none;
}

p:empty {
  display: none;
}

.image-options {
  vertical-align: top;
  position: fixed;
  left: 0;
  top: 40%;
  width: 39px;
}

.image-options ul li {
  list-style: none;
}

/*------------------------------------------------------------------
Section
*/
#main .main-content {
  padding-bottom: 1px;
  padding-top: 13px;
  padding-left: 3%;
  padding-right: 3%;
  background-color: #f7f7f7;
}


/*Breadcrumbs*/

.breadcrumbs {
  position: relative;
  display: block;
  margin-bottom: 10px;
  padding: 20px 10px 20px 10px;
  max-width: 100%;
}

.breadcrumbs ul {
  padding: 0;
  margin: 0;
  list-style: none;
  display: block;
  font-size: 12px;
}

.breadcrumbs li {
  display: inline;
  margin-right: 10px;
  line-height: 17px;
}

.breadcrumbs ul li:after {
  padding-left: 2px;
  padding-right: 2px;
  content: " » ";
  display: inline-block;
  vertical-align: middle;
  position: relative;
  top: -1px;
  right: -5px;
}

.breadcrumbs ul li:last-child {
  font-weight: bold;
}

.breadcrumbs ul li:last-child:after {
  content: "";
}

/*Search form*/

.search-form {
  float: right;
  margin: 0 0 0 20px;
}

.search-form .search-fields {
  display: block;
  position: relative;
  float: left;
  width: 138px;
  height: 40px;
  overflow: hidden;
}

.search-form .search-field {
  padding: 0 40px 0 20px;
  width: 72px;
  height: 38px;
  overflow: hidden;
  line-height: 38px;
  border: 0;
  color: #666666;
  border-radius: 4px;
  border-width: 1px;
  border-style: solid;
  border-color: #cccccc;
  border-radius: 4px;
  transition: border-color 300ms linear;
}

.search-form .search-fiels:hover .search-field {
  border-color: #033153;
}

.search-form .search-field:focus,
.search-form .search-field:hover {
  border-color: #033153;
}

.search-form .search-submit {
  cursor: pointer;
  position: absolute;
  right: 1px;
  top: 1px;
  padding: 0;
  width: 38px;
  height: 38px;
  border: 0 none;
  background-color: #ffffff;
  opacity: 0.3;
  border-radius: 4px;
  transition: opacity 300ms linear;
}

.search-form .search-submit .fa {
  font-size: 16px;
}

.search-form .search-submit:focus, .search-form .search-submit:hover {
  opacity: 1;
}

.content-top-wrap {
  box-sizing: border-box;
}

.content-top-wrap {
  height: 73px;
  position: relative;
  z-index: 10;
}

.content-top {
  height: 72px;
  border-bottom: 1px solid #dadbda;
  background-color: #fff;
  opacity: 1;
  transition: opacity 300ms 300ms ease;
}

.content-top .wrapper {
  width: 1320px;
  margin: 0 auto;
  box-sizing: border-box;
  padding: 0 10px;
}

.content-top .logo {
  float: left;
  margin: 15px 0 0 0;
  position: relative;
  z-index: 3;
}

.main-menu {
  float: right;
  margin: 16px 0 0 0;
  height: 38px;
  color: #666;
}

.main-menu ul {
  list-style: none;
  margin: 2px 0 0 0;
  padding: 0;
  display: inline-block;
  float: right;
}

.main-menu-content {
  width: 100%;
}

.main-menu ul li.menu-item {
  display: inline-block;
  height: 38px;
  line-height: 38px;
  color: #003151;
  font-family: 'latomedium', sans-serif;
  font-size: 14px;
  text-transform: uppercase;
  margin: 0 11px;
  cursor: default;
  font-weight: 400;
}

.main-menu ul li.item-active {
  font-family: 'latoblack', sans-serif;
  margin: -1px 12px 0 12px;
}

.main-menu ul li a {
  color: #003151;
  display: block;
}

.main-menu ul li a:hover,
.main-menu ul li.sub-menu-visible > a {
  color: #073e62;
}

.main-menu ul li.has-sub-menu {
  position: relative;
}

.main-menu ul li.has-sub-menu > a {
  position: relative;
}

.main-menu ul li.has-sub-menu > a:after {
  content: '\f077';
  font-family: FontAwesome;
  font-style: normal;
  font-weight: normal;
  font-size: 12px;
  line-height: 36px;
  height: 38px;
  display: inline-block;
  position: relative;
  right: 0;
  top: -2px;
  margin: 0 0 0 6px;
  transition:300ms ease;
  transform:rotate(180deg);
}

.main-menu ul li.has-sub-menu > a:hover:after,
.main-menu ul li.sub-menu-visible > a:after {
  transform:rotate(0deg);
}

.main-menu .sub-menu {
  position: absolute;
  left: -18px;
  top: 33px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 700ms ease;
}

.main-menu .sub-menu:after,
.main-menu .sub-menu:before {
  top: 10px;
  left: 64px;
  border: solid transparent;
  content: ' ';
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
  transition: top 300ms 300ms ease;
}

.main-menu .sub-menu:after {
  border-color: rgba(255, 255, 255, 0);
  border-bottom-color: #fff;
  border-width: 11px;
  margin-left: -11px;
  z-index: 5;
}

.main-menu li.sub-menu-visible .sub-menu:after {
  top: -6px;
}

.main-menu .sub-menu:before {
  border-color: rgba(199, 199, 199, 0);
  border-bottom-color: #989898;
  border-width: 12px;
  margin-left: -12px;
  z-index: 3;
}

.main-menu li.sub-menu-visible .sub-menu:before {
  top: -8px;
}

.main-menu .sub-menu ul {
  margin: 0;
}

.main-menu .sub-menu ul.menu {
  display: block;
  position: relative;
  z-index: 4;
  width: 276px;
  border: 1px solid #c5c5c5;
  background-color: #fff;
  padding: 4px 0 4px;
  margin: 15px 40px 40px 0;
  box-shadow: 7px 7px 15px 0 rgba(0,0,0,.2);
}

.main-menu ul li.sub-menu-visible .sub-menu {
  max-height: 700px;
}

.main-menu .sub-menu ul.menu li {
  margin: 3px 0 4px;
  display: block;
  height: auto;
}

.main-menu .sub-menu ul.menu li a {
  font-size: 13px;
  line-height: 15px;
  padding: 8px 23px 6px;
  display: block;
}

.main-menu .sub-menu ul.menu li a:hover {
  color: #fff;
  text-shadow: 1px 1px 0 rgba(0,38,81,.7);
  background: #447cbb;
  background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iIzQ0N2NiYiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiM1MDg5YzkiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
  background: linear-gradient(to bottom,  #447cbb 0%,#5089c9 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#447cbb', endColorstr='#5089c9',GradientType=0 ); /* IE6-8 */
}

.main-menu a.featured-link {
  height: 38px;
  line-height: 38px;
  float: right;
}

.main-menu a.featured-link .btn-gold {
  padding: 0 58px 0 18px;
  margin: 0 0 0 52px;
  position: relative;
  height: 38px;
  line-height: 38px;
  display: block;
  color: #bb461c;
  font-family: 'latoblack', sans-serif;
  font-size: 13px;
  text-transform: uppercase;
  text-shadow: 0 -2px 0 rgba(255,255,255, .4);
  border: 1px solid #d6b118;
  -webkit-border-radius: 4px;
  -moz-border-radius: 4px;
  border-radius: 4px;
  background: #fada1f;
  background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZhZGExZiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNlZWQwMWUiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
  background: linear-gradient(to bottom,  #fada1f 0%,#eed01e 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fada1f', endColorstr='#eed01e',GradientType=0 ); /* IE6-8 */
}

.main-menu a.featured-link .btn-gold:hover {
  background: #FCDE37;
}

.main-menu a.featured-link .btn-gold:active {
  background: #eed01e;
  background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2VlZDAxZSIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmYWRhMWYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
  background: linear-gradient(to bottom,  #eed01e 0%,#fada1f 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#eed01e', endColorstr='#fada1f',GradientType=0 ); /* IE6-8 */
}

.main-menu a.featured-link .btn-gold:after {
  background-image: url(/akademia/wp-content/themes/mfind/images/main-menu/btn-gold-arrow-right.png);
  background-repeat:no-repeat;
  width:21px;
  height:23px;
  display:inline-block;
  content:"";
  position:absolute;
  right:16px;
  top:8px;
}

.main-menu a.featured-link .featured-link-mobile {
  display: none;
  border-top: 1px solid #fff;
  padding: 37px 0 22px 60px;
  font-family: 'latomedium', sans-serif;
  font-size: 18px;
  line-height: 24px;
  color: #003151;
  text-transform: uppercase;
  position:relative;
  background: #f2f2f2;
  background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2YyZjJmMiIgc3RvcC1vcGFjaXR5PSIxIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMSIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
  background: linear-gradient(to bottom,  #f2f2f2 0%,#ffffff 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#f2f2f2', endColorstr='#ffffff',GradientType=0 ); /* IE6-8 */
}

.main-menu a.featured-link .featured-link-mobile:after {
  content: '';
  background-image: url(https://s3.eu-central-1.amazonaws.com/mfind-production/images/akademia-images/btn-gold-arrow-right.png);
  background-repeat: no-repeat;
  width: 25px;
  height: 27px;
  float: left;
  position: absolute;
  left: 19px;
  top: 38px;
}

.sub-text {
  color: #656565;
  text-transform: none;
}

.main-menu a.featured-link .featured-link-mobile:hover {
  background: #eef5e6;
}

.main-menu .menu-mobile-trigger {
  display: none;
  float: right;
  height: 65px;
  line-height: 65px;
  color: #033153;
  font-family: 'latomedium', sans-serif;
  text-transform: uppercase;
  font-size: 23px;
  cursor: pointer;
  overflow: hidden;
  user-select: none;
}

.main-menu .menu-mobile-trigger:after {
  content: '\f077';
  font-family: FontAwesome;
  font-style: normal;
  font-weight: normal;
  font-size: 16px;
  line-height: 63px;
  height: 65px;
  display: inline-block;
  position: relative;
  right: 0;
  top: -4px;
  margin: 0 0 0 6px;
  transition: 300ms ease;
  transform:rotate(180deg);
}

.mobile-menu-visible .menu-mobile-trigger:after {
  transform: rotate(0deg);
}
.mobile-menu-visible .menu-mobile-trigger {
  color: #073e62;
}
.fixed-menu-active .content-top {
  width: 100%;
  position: fixed;
  top: 0;
  left: 0;
  box-shadow: 0 5px 12px 0 rgba(0,0,0,.15);
}

@-webkit-keyframes menu-scroll-in {
  0% {
    top: -73px;
  }
  100% {
    top: 0;
  }
}
@keyframes menu-scroll-in {
  0% {
    top: -73px;
  }
  100% {
    top: 0;
  }
}

.menu-scroll-in .content-top {
  animation-name: menu-scroll-in;
  animation-duration: 700ms;
  animation-direction: linear;
  animation-timing-function: ease;
}

@-webkit-keyframes menu-scroll-out {
  0% {
    top: 0;
  }
  100% {
    top: -73px;
  }
}
@keyframes menu-scroll-out {
  0% {
    top: 0;
  }
  100% {
    top: -73px;
  }
}

.menu-scroll-out .content-top {
  animation-name: menu-scroll-out;
  animation-duration: 700ms;
  animation-direction: linear;
  animation-timing-function: ease;
}

@-webkit-keyframes menu-fade-in {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
@keyframes menu-fade-in {
  0% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}

.menu-fade-in .content-top {
  animation-name: menu-fade-in;
  animation-duration: 200ms;
  animation-direction: linear;
  animation-timing-function:ease;
  -webkit-animation-fill-mode: forwards;
  animation-fill-mode: forwards;
  top: 0;
}

.main-menu-content-scroll-wrap {
  max-height: 0;
}

.main-menu-content {
  position: relative;
}

.main-menu_searchForm {
  display: none;
  width: 100px;
  height: 40px;
  float: right;
  margin-left: 14px;
  border: 1px solid #ccc;
  box-sizing: border-box;
  background: #fff;
  padding: 13px;
  font-size: 12px;
  text-transform: uppercase;
  color: #999;
  transition: border-color .1s linear;
}

.main-menu_searchForm:hover {
  border-color: #003151;
}

.main-menu_searchForm .fa {
  float: right;
  font-size: 16px;
  position: relative;
  top: -2px;
}

.main-menu_searchForm > div {
  display: none;
  color: #003151;
}

.main-menu_searchForm.is-open {
  width: 85%;
  position: absolute;
  right: 0;
  margin: 0;
  font-size: 0;
  padding: 4px;
  z-index: 1;
}

.main-menu_searchForm.is-open:hover {
  border-color: #ccc;
}

.main-menu_searchForm.is-open .fa {
  display: none;
}

.main-menu_searchFormToggle {
  display: none;
  position: absolute;
  left: 15%;
  top: 0;
  margin-left: -67px;
  font-size: 11px;
  padding: 13px;
  height: 40px;
  box-sizing: border-box;
  text-transform: uppercase;
  border: 1px solid #ccc;
  border-radius: 4px;
  color: #003151;
  cursor: pointer;
  transition: border-color .1s linear;
}

.main-menu_searchFormToggle:hover {
  border-color: #003151;
}

.main-menu-content .social {
  margin-top: 7px;
}

@media only screen and (max-width: 1380px) {
  .content-top .wrapper {
    width: 100%;
  }
}

@media all and (max-width: 1250px){
  .main-menu ul li.menu-item {
    font-size: 13px;
  }

  .main-menu-content ul.social {
    display: none;
  }

}

@media only screen and (max-width: 1128px) {
  .search-form {
    display: none;
  }
}

@media only screen and (max-width: 980px) {
  .content-top-wrap {
    height: 66px;
  }

  .content-top {
    height: 65px;
  }

  .content-top .wrapper {
    width: 100%;
    height: 65px;
    padding: 0 20px;
  }

  .content-top .logo {
    margin: 12px 0 0 0;
  }

  .main-menu {
    height: 65px;
    margin: 0;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    padding: 0 20px;
    z-index: 2;
    box-sizing: border-box;
  }

  body.mobile-menu-active {
    height: 100%;
    overflow: hidden;
  }

  .main-menu-content-scroll-wrap {
    overflow: hidden;
    position: relative;
    top: 0;
    margin: 0 -20px;
    padding: 0 20px 0 20px;
    width: 100%;
    height: 0;
    border-top: 1px solid #d0d0d0;
    transition: max-height 600ms ease;
  }

  .mobile-menu-visible .main-menu-content-scroll-wrap {
    overflow-y: scroll;
    overflow-x: hidden;
    max-height: 1000px;
  }

  .main-menu .menu-mobile-trigger {
    display: inline-block;
  }

  .main-menu .main-menu-content-wrap {
    width: 100%;
    height: auto;
    overflow: hidden;
    position: absolute;
    left: 0;
  }

  .main-menu .main-menu-content {
    display: block;
    position: relative;
    background: #fff;
    box-shadow: 0 5px 12px 0 rgba(0,0,0,.15);
  }

  .main-menu .sub-menu {
    display: block;
  }

  .main-menu .menu-mobile-trigger {
    position: relative;
  }

  .main-menu .menu-arrow {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 15px;
    line-height: 15px;
    display: inline-block;
    overflow: hidden;
  }

  .main-menu .menu-arrow:after,
  .main-menu .menu-arrow:before {
    bottom: -15px;
    left: 30px;
    border: solid transparent;
    content: ' ';
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    transition: bottom 300ms 300ms ease;
  }

  .main-menu .menu-arrow:after {
    left: 31px;
    border-color: rgba(255, 255, 255, 0);
    border-bottom-color: #f1f1f1;
    border-width: 11px;
    margin-right: -11px;
  }

  .mobile-menu-visible .menu-arrow:after {
    bottom: 0;
  }

  .main-menu .menu-arrow:before {
    border-color: rgba(199, 199, 199, 0);
    border-bottom-color: #989898;
    border-width: 12px;
    margin-right: -12px;
  }

  .mobile-menu-visible .menu-arrow:before {
    bottom: 0;
  }

  .mobile-menu-visible .main-menu-content-wrap {
    max-height: 1000px;
  }

  .main-menu .main-menu-content a.btn-gold {
    float: none;
    display: block;
  }

  .main-menu ul li.has-sub-menu > a,
  .main-menu ul li.has-sub-menu > a:after {
    display: none;
  }

  .main-menu ul {
    display: block;
    float: none;
    margin: -1px 0 0 0;
  }

  .main-menu ul li.menu-item {
    border-top: 1px solid #dfdcdc;
    display: block;
    margin: 0;
    font-size: 23px;
    height: auto;
  }

  .main-menu ul li.item-active {
    margin: 0;
  }

  .main-menu ul li a {
    font-size: 18px;
    padding: 23px 15px 23px 50px;
    line-height: 26px;
  }

  .main-menu ul li a:hover {
    background: #eef5e6;
    border-color: #e6f0db;
    color: #003151;
  }

  .main-menu .sub-menu {
    max-height: 1000px;
    height: auto;
    position: static;
    left: 0;
    top:0;
  }

  .main-menu .sub-menu ul.menu {
    width: 100%;
    padding: 12px 0;
    margin: 0;
    border: 0;
    -webkit-box-shadow: 0 0 0 0 rgba(0,0,0,.2);
    box-shadow: 0 0 0 0 rgba(0,0,0,.2);
  }

  .main-menu .sub-menu:after, .main-menu .sub-menu:before {
    display: none;
  }

  .main-menu .sub-menu ul.menu li {
    margin: 0;
    border:0;
  }

  .main-menu .sub-menu ul.menu li a {
    font-size: 18px;
    padding: 8px 15px 7px 50px;
    line-height: 26px;
    border-width: 1px 0;
    border-color: #fff;
    border-style: solid;
  }

  .main-menu .sub-menu ul.menu li a:hover {
    background: #eef5e6;
    border-color: #e6f0db;
    color: #003151;
    text-shadow: 0 0 0 rgba(0,38,81,.7);
  }

  .main-menu a.featured-link {
    height: auto;
    display: block;
    float: none;
  }

  .main-menu a.featured-link .btn-gold {
    display: none;
  }

  .main-menu a.featured-link .featured-link-mobile {
    display: block;
  }

  .main-menu ul li p {
    padding: 15px 15px 0 50px;
  }

}

@media (min-width: 981px) {
.main-menu_searchForm {
display: block;
}
.main-menu_searchForm {
border-radius: 4px;
}
.main-menu {
width: 89%;
}
}

@media (min-width: 1020px) {
.main-menu_searchForm {
width: 140px;
}
}

@media (min-width: 1200px) {
.main-menu {
width: 91%;
}
.content-top .wrapper {
padding: 0 30px
}
}

.heading-title {
  width: 100%;
  margin: 10px 0 20px 0;
  position: relative;
}

.heading-title h1 {
  padding: 0 50px;
  font-size: 32px;
  line-height: 40px;
  font-weight: 400;
  text-align: center;
  color: #003151;
}

.heading-title nav.social {
  display: table;
  width: 100%;
  vertical-align: middle;
  height: 100%;
  position: absolute;
  top: 4px;
  right: 0;
}

.heading-title nav.social > ul {
  display: table-cell;
  vertical-align: middle;
  width: 100%;
}

ul.social {
  float: right;
  width: 170px;
  text-align: center;
}

ul.social li {
  position: relative;
  margin-left: 1.3%;
  list-style: none;
  color: #033153;
  vertical-align: middle;
  display: inline-block;
}

ul.social li a {
  display: block;
  width: 27px;
  height: 27px;
  text-indent: -10000px;
}

ul.social .fa:before {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  line-height: 31px;
  pointer-events: none;
}

ul.social li.wykop a {
  background: url("https://s3.eu-central-1.amazonaws.com/mfind-production/images/akademia-artykuly/academy-social-wykop.png") no-repeat center;
}


/*13. Ajax search*/

#ajaxsearchlite1 .probox .proinput,
div[id*="ajaxsearchlite"] .probox .proinput {
  margin: 0;
}

div[id*='ajaxsearchlite'] .probox .proinput {
  margin: 0;
}

div[id*='ajaxsearchlite'].wpdreams_asl_container,
div[id*="ajaxsearchlite"] {
  box-shadow: none;
}


/* tags - left sidebar */
#content-cont #content .article.with-sidebar .sidebar {
  margin: 0 40px 0 0;
  padding: 0 10px 0 0;
  width: 210px;
  position: absolute;
  left: 0;
  top: 0;
}

.article .sidebar {
  padding: 0;
}

.sidebar-left .widget {
  padding: 0 10px 40px 10px;
}

header.main > .content,
#main .main-content,
#content-cont {
  width: auto !important;
  display: block;
  max-width: 1166px;
  padding-left: 10px;
  padding-right: 10px;
  margin: 0 auto;
}

@media screen and (max-width: 767px) and (orientation: portrait) {
  .heading-title {
      display: none !important;
  }
}

<?php if (is_home()) { ?>
/*19. Main Page*/

.academy-filters {
  text-align: center;
  margin: 10px 0 30px;
  display: flex;
  justify-content: space-between;
}

.academy-filters .academy-filters_btn {
  position: relative;
  border-radius: 15px;
  display: inline-block;
  width: 25%;
  padding: 12px 10px 8px;
  color: #fff;
  font-family: 'latoregular';
  cursor: pointer;
  -webkit-tap-highlight-color: transparent;
}

.academy-filters .academy-filters_btn:nth-last-child(-n+3) {
  margin-top: 10px;
}

.academy-filters .academy-filters_btn > div {
  transition: opacity .1s linear;
}

.academy-filters .academy-filters_btnTxt {
  font-size: 8px;
  text-transform: uppercase;
  padding-top: 8px;
}

.academy-filters_more {
  display: none;
  text-align: center;
  clear: both;
  padding: 10px 0 25px;
}

.academy-filters .academy-filters_btn.is-active {
  cursor: default;
}

.academy-filters .academy-filters_btn.is-active::after {
  content: '';
  display: none;
  position: absolute;
  bottom: -7px;
  margin: auto;
  left: 0;
  right: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 8px 8px 0 8px;
  border-color: transparent;
}

.academy-filters .academy-filters_btnAllArticles.is-active::after {
  border-top-color: #162d45;
}

.academy-filters .academy-filters_btnCar.is-active::after {
  border-top-color: #8baf36;
}

.academy-filters .academy-filters_btnHealth.is-active::after {
  border-top-color: #00a094;
}

.academy-filters .academy-filters_btnTravel.is-active::after {
  border-top-color: #007bc1;
}

.academy-filters .academy-filters_btnHome.is-active::after {
  border-top-color: #d47c3b;
}

.academy-filters .academy-filters_btnPartnerZone.is-active::after {
  border-top-color: #6ea7ca;
}

.academy-filters .academy-filters_btnAllArticles {
  background: #162d45;
}

.academy-filters .academy-filters_btnCar {
  background: #8baf36;
}

.academy-filters .academy-filters_btnHealth {
  background: #00a094;
}

.academy-filters .academy-filters_btnTravel {
  background: #007bc1;
}

.academy-filters .academy-filters_btnHome {
  background: #d47c3b;
}

.academy-filters .academy-filters_btnPartnerZone {
  background: #6ea7ca;
}

.academy-filters .section-inactive .academy-filters_btnPartnerZone {
  background: #dfdfdf;
  color: #9f9f9f;
}

.main-content.is-loading .academy-filters_btn:not(.is-active),
.main-content.is-loaded .academy-filters_btn:not(.is-active) {
  background: #fff;
  color: #003151;
  border: 1px solid #e5e5e5;
}

.main-content.is-loading .academy-filters_btn:not(.is-active) .icon-academy-sections-all::before,
.main-content.is-loaded .academy-filters_btn:not(.is-active) .icon-academy-sections-all::before {
  color: #162d45;
}

.main-content.is-loading .academy-filters_btn:not(.is-active) .icon-academy-sections-car::before,
.main-content.is-loaded .academy-filters_btn:not(.is-active) .icon-academy-sections-car::before {
  color: #8baf36;
}

.main-content.is-loading .academy-filters_btn:not(.is-active) .icon-academy-sections-health::before,
.main-content.is-loaded .academy-filters_btn:not(.is-active) .icon-academy-sections-health::before {
  color: #00a094;
}

.main-content.is-loading .academy-filters_btn:not(.is-active) .icon-academy-sections-travel::before,
.main-content.is-loaded .academy-filters_btn:not(.is-active) .icon-academy-sections-travel::before {
  color: #007bc1;
}

.main-content.is-loading .academy-filters_btn:not(.is-active) .icon-academy-sections-home::before,
.main-content.is-loaded .academy-filters_btn:not(.is-active) .icon-academy-sections-home::before {
  color: #d47c3b;
}

.main-content.is-loading .academy-filters_btn:not(.is-active) .icon-academy-sections-sponsored::before,
.main-content.is-loaded .academy-filters_btn:not(.is-active) .icon-academy-sections-sponsored::before {
  color: #6ea7ca;
}

.main-content.is-loaded .academy-filters_btn:not(.is-active) > div {
  opacity: .5;
}

.main-content.is-loaded .academy-filters_btn:hover > div {
  opacity: 1;
}

.main-content.is-loading .filters-loading {
  height: 30px;
  opacity: 1;
}

.main-content .other-topics {
  opacity: 1;
  transition: opacity .3s ease-out;
}

.main-content.is-loading .top-topics,
.main-content.is-loading .other-topics {
  opacity: 0;
}

.main-content.is-loading .top-topics,
.main-content.is-loaded .top-topics,
.main-content.is-all-load.is-loaded .academy-filters_more {
  display: none;
}

.main-content.is-loaded .academy-filters_more,
.main-content.all-articles .academy-filters_more {
  display: block;
}

@media (min-width: 480px) {

  .academy-filters .academy-filters_btn {
    width: 19%;
  }

  .academy-filters .academy-filters_btnTxt {
    font-size: 12px;
  }

}

@media (min-width: 850px) {

  .academy-filters {
    flex-flow: row;
  }

  .academy-filters .academy-filters_btn {
    width: 13.5%;
    padding: 12px 10px;
  }

  .academy-filters .academy-filters_btn:nth-last-child(-n+3) {
    margin-top: 0;
  }

  .academy-filters .academy-filters_btn.is-active::after {
    display: block;
  }

  .academy-filters .academy-filters_btnTxt {
    vertical-align: middle;
    font-size: 12px;
    display: inline-block;
    padding-top: 0;
  }

}

.top-topics.section {
  display: inline-block;
  vertical-align: middle;
  width: 100%;
}

.top-topics.section .box.large {
  float: left;
  width: 49%;
  height: 556px;
  margin-bottom: 2%;
}

.top-topics.section .box.large .details p {
  font-size: 15px;
  line-height: 20px;
  height: 126px;
  overflow: hidden;
  padding: 0 30px;
}

.top-topics.section .box.side {
  margin-left: 1.5%;
  height: 265px;
  margin-bottom: 26px;
  padding-bottom: 0;
  float: right;
  width: 49%;
  display: table;
  box-shadow: 0 0 0 1px #e5e5e5;
}

.top-topics.section .box.side .image-date-wrapper {
  margin-bottom: 0;
  width: 60%;
  padding: 0;
  display: table-cell;
  vertical-align: middle;
  text-align: left;
  margin-bottom: 1px;
}

.top-topics.section .box.side .image-date-wrapper a img {
  width: 100%;
  height: auto;
  max-height: 210px;
  vertical-align: middle;
}

.top-topics.section .box.side .image-date-wrapper .date-with-bg {
  display: none;
}

.top-topics.section .box.side > .details {
  padding: 5% 0 1%;
  min-width: 190px;
  width: 40%;
  text-align: left;
  display: table-cell;
  vertical-align: middle;
}

.top-topics.section .box.side > .details p.date-with-bg {
  padding: 0 20px;
  margin-bottom: 9px;
}

.top-topics.section .box.side .like {
  display: none;
}

.top-topics.section .box .post-title {
  height: auto;
  margin-bottom: 7px;
}

@media screen and (max-width: 767px) and (orientation: portrait) {
  .top-topics.section .box .post-title {
    margin-bottom: 15px;
  }
}

.box .post-title {
  padding: 0 30px;
  margin-bottom: 14px;
  font-size: 20px;
  line-height: 27px;
  height: 106px;
  overflow: hidden;
  font-weight: 300;
}

.box .post-title a {
  color: #333;
  line-height: 27px;
}

.top-topics.section .box.large .details p,
.categories-page.search .box p {
  line-height: 22px;
  font-size: 15px;
  color: #717171;
}

.top-topics.section .box > a {
  text-align: center;
  display: block;
  position: relative;
  margin: 1px 1px 17px;
  overflow: hidden;
}

.top-topics.section .box .image-date-wrapper {
  margin-bottom: 12px;
}

.top-topics.section .box.side .post-title {
  height: 190px;
}

.section.academy {
  min-height: 200px;
  transition: min-height 1s linear;
}

.other-topics.section {
  display: block;
  margin-left: -2%;
}

.other-topics.section .box,
.other-topics.section #most-popular {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}

.other-topics.section .box {
  display: inline-block;
  width: 31.3%;
  height: 420px;
  margin-left: 2%;
  margin-bottom: 27px;
  position: relative;
  float: left;
}

.other-topics.section #most-popular {
  float: right;
  margin-left: 2%;
  width: 31.3%;
  height: 420px;
  margin-bottom: 27px;
  overflow: hidden;
}

.other-topics.section p.text-button {
  margin-bottom: 30px;
  clear: both;
  text-align: center;
}

.box {
  padding-bottom: 10px;
  box-shadow: 0 0 0 1px #e5e5e5;
  background-color: white;
  box-sizing: border-box;
}

.box .image-date-wrapper {
  text-align: center;
  display: block;
  position: relative;
  margin: 0 0 17px;
  overflow: hidden;
}

.box .image-date-wrapper img.post-image {
  width: 100%;
  height: auto;
  padding-bottom: 0;
}

.box .image-date-wrapper > a {
  margin: 0;
  width: 100%;
  height: 100%;
  display: block;
  background-size: cover;
  background-repeat: no-repeat;
  background-color: rgba(0,0,0,0.2);
}

.box .post_author {
  display: block;
  margin-bottom: 1px;
  padding: 0 30px 8px;
  font-size: 12px;
  line-height: 12px;
  height: 12px;
  overflow: hidden;
  text-transform: uppercase;
  color: #a3a3a3;
}

.box.color_default {
  border-left: 4px solid #003151;
}

.box.color_car {
  border-left: 4px solid #78b228;
}

.box.color_tour {
  border-left: 4px solid #007dcd;
}

.box.color_home {
  border-left: 4px solid #ef7431;
}

.box.color_health {
  border-left: 4px solid #00bda7;
}

.post .article-image {
  border-bottom: 5px solid #003151;
}

.post.tag-ubezpieczenie-zdrowotne .article-image {
  border-bottom: 5px solid #00bda7;
}

.post.tag-ubezpieczenie-turystyczne .article-image {
  border-bottom: 5px solid #007dcd;
}

.post.tag-ubezpieczenie-mieszkania .article-image,
.post.tag-ubezpieczenie-domu .article-image {
  border-bottom: 5px solid #ef7431;
}

.post.tag-ubezpieczenie-oc .article-image,
.post.tag-ubezpieczenie-ac .article-image {
  border-bottom: 5px solid #78b228;
}

.post #summary {
  border: 2px solid #003151;
}

.post.tag-ubezpieczenie-zdrowotne #summary {
  border: 2px solid #00bda7;
}

.post.tag-ubezpieczenie-turystyczne #summary {
  border: 2px solid #007dcd;
}

.post.tag-ubezpieczenie-mieszkania #summary,
.post.tag-ubezpieczenie-domu #summary {
  border: 2px solid #ef7431;
}

.post.tag-ubezpieczenie-oc #summary,
.post.tag-ubezpieczenie-ac #summary {
  border: 2px solid #78b228;
}

.post #content .article-section-title,
.post #content a {
  margin-bottom: 15px;
}

.post #content .more-posts .box .details a {
  color: #323232;
  font-family: 'latoregular';
  font-size: 16px;
}

.post #content .more-posts .box .details a.post_author {
  color: #c7c7c7;
  font-size: 14px;
}

.post.tag-ubezpieczenie-zdrowotne .article-section-title,
.post.tag-ubezpieczenie-zdrowotne .article-info_author-name,
#content .box.color_health .post-title a:hover,
#wrapper .box.color_health .post-title a:hover,
.post.tag-ubezpieczenie-zdrowotne #content .article-section-title,
.post.tag-ubezpieczenie-zdrowotne #content a {
  color: #00bda7;
}

.post.tag-ubezpieczenie-turystyczne .article-section-title,
.post.tag-ubezpieczenie-turystyczne .article-info_author-name,
#content .box.color_tour .post-title a:hover,
#wrapper .box.color_tour .post-title a:hover,
.post.tag-ubezpieczenie-turystyczne #content .article-section-title,
.post.tag-ubezpieczenie-turystyczne #content a {
  color: #007dcd;
}

.post.tag-ubezpieczenie-mieszkania .article-section-title,
.post.tag-ubezpieczenie-domu .article-section-title,
.post.tag-ubezpieczenie-mieszkania .article-info_author-name,
.post.tag-ubezpieczenie-domu .article-info_author-name,
#content .box.color_home .post-title a:hover,
#wrapper .box.color_home .post-title a:hover,
.post.tag-ubezpieczenie-mieszkania #content .article-section-title,
.post.tag-ubezpieczenie-mieszkania #content a,
.post.tag-ubezpieczenie-domu #content .article-section-title,
.post.tag-ubezpieczenie-domu #content a   {
  color: #ef7431;
}

.post.tag-ubezpieczenie-oc .article-section-title,
.post.tag-ubezpieczenie-ac .article-section-title,
.post.tag-ubezpieczenie-oc .article-info_author-name,
.post.tag-ubezpieczenie-ac .article-info_author-name,
#content .box.color_car .post-title a:hover,
#wrapper .box.color_car .post-title a:hover,
.post.tag-ubezpieczenie-oc #content .article-section-title,
.post.tag-ubezpieczenie-oc #content a,
.post.tag-ubezpieczenie-ac #content .article-section-title,
.post.tag-ubezpieczenie-ac #content a {
  color: #78b228;
}

.post #content .categories-page .box a,
.post #content a:hover {
  color: inherit;
}

.post .article-image {
  border-bottom: 3px solid #003151;
}

@media (max-width: 767px) {
  .top-topics.section .box.large, .top-topics.section .box.side {
    width: auto !important;
  }
}

@media screen and (max-width: 767px) and (orientation: portrait) {
  .top-topics.section .box.large {
    height: auto;
  }
}

.top-topics.section .box.large .image-date-wrapper {
  width: 100%;
  height: 265px;
  display: block;
  overflow: hidden;
  box-sizing: border-box;
  padding: 0;
  margin: 0 0 32px 0;
}

<?php } else { ?>

.single #content-cont #content {
  background: #fff;
  border: 1px solid #eaebed;
}

#content-cont #content {
  float: left;
  width: 71%;
}

#content-cont #content .container {
    padding: 20px 30px;
}

#content-cont #sidebar {
  float: right;
  width: 27%;
  min-width: 310px;
  position: relative;
}

@media only screen and (max-width: 768px) {
  #content-cont #content {
    width: auto;
    max-width: 100%;
  }
}

@media (max-width: 767px) {
  #content-cont #content .container {
    padding: 20px 2%;
  }
}

@media only screen and (max-width: 600px) {
  .article-info .share-social {
    float: none;
    padding: 0;
  }
}

<?php } ?>

div.asl_s.searchsettings {
    width: 200px;
    height: auto;
    position: absolute;
    display: none;
    z-index: 1101;
    border-radius: 0 0 3px 3px;
    visibility: hidden;
    padding: 0;
}
</style>
