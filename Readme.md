Clan Comet v0.3a
================

Clan Comet is a content management system aimed at esport teams who need powerfull website solution. It's made on Codeigniter PHP framework, and comes with a ton of features!

Installing
----------
1. Upload all the files on server.
2. Visit: www.yoursite.com/install
3. Follow the steps

Dependecies
-----------
### Codeigniter:
* [Twig parser](https://github.com/zjvren/CI-Twig-Parser)
* [HMVC](https://bitbucket.org/wiredesignz/codeigniter-modular-extensions-hmvc/)
* [Ion Auth](http://benedmunds.com/ion_auth/)
* [Template](http://getsparks.org/packages/template/show)
* [HTML Purifier](http://htmlpurifier.org/)
* [CI Markdown](https://github.com/jonlabelle/ci-markdown)

### HTML / Javascript
* [Twitter Bootstrap](http://twitter.github.io/bootstrap/)
* [Pure.css](http://purecss.io/)
* [Morris.js](http://www.oesmith.co.uk/morris.js/index.html)
* [CKEditor](http://ckeditor.com/)
* [MarkItUp](http://markitup.jaysalvat.com/home/)
* [pickdate.js](http://amsul.ca/pickadate.js/)
* [Font Awesome Icons](http://fortawesome.github.io/Font-Awesome/)
* [Select 2](http://ivaynberg.github.io/select2/)
* [Bootbox](http://bootboxjs.com/)
* [iCheck](http://damirfoy.com/iCheck/)
* [jQuery Cookie](https://github.com/carhartl/jquery-cookie)
* [SlimBox 2](http://www.digitalia.be/software/slimbox2/)

Changelog
----------
### v0.5 TBA
- New frontend theme!
- Added match statistics
- Added module info text files
- Fixed unable to delete match scores
- Added missing styles for a login page
- User permissions now kinda work
- Updates to most of module frontend layouts

### v0.4.1, 2013-07-12
- When adding new site navigation link sort field is auto incremented
- Bugfix: Lowercased all country icons for case sensitive enviroment settings
- Admin sidebar links now have title attribute
- Changed database collation to ut8_unicode_ci
- Bugfix: Date error while editing events
- Added post-specific images when adding new post

### v0.4, 2013-07-06
- Added admin notes
- Added footer
- Added site navigation module and widget
- Added missing folders
- Updated installer

### v0.3a, 2013-06-30
- First public release

### v0.1
- Initial release

TODO / Bugs
-----------
- User permissions not quite yet done
- Optimize visits table
- Admin error messages
- Finish missing paginations and sortings
- Add datatables support instead of current buggy table ordering
- Create module tips and help
- [Edit] Image deletion
- Rework roster management
- Rework widgets base code

NOTES
-----
If you are using code directly from this repository you'll need to change some stuff in .htaccess file. Also installer will not work, instead use the import.sql database and install manually!
Default admin:
user: admin
pwd: password