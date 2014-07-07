wordpress
=========

Local Wordpress development

## TODO

### Homepage:
- [x] Left and Right arrow icons missing from main carousel, you should have these as SVG *change .slide_nav_left/right img src on front-page.php plus styles for flipped arrow - consider background-image instead to match .bx-prev/next*
- [x] Strap line ‘creative. production. post production. distribution.’ should be in the dark colour #828175. white should be for links only. *change colour*
- [x] The thumbnail images look squashed? In my PSD they should be 377 x 214 *need to change this on functions.php and style.css*
- [x] Check your spacings, the grid of thumbs should be the same width as the main carousel image 1180 pixels *fixed by above size change*
- [x] The rollovers on the thumbnails should be darker, are you just fading the image down? In the design I had a dark block #828175 set to about 80% opacity *change .teaser-overlay*
- [x] In the design I removed the pagination controls and only had them on the Work section? Needs a bit more space above and below it about 50px *remove .pagination section and change style*
- [x] Arrow icons on the client logo carousel should be white, rollover to the dark colour 828175 *will need to try to do this with css-filters*
- [x] Type size on tweets looks a bit smaller than design, also needs a bit more line spacing. *check psd*
- [x] Needs more vertical padding between elements, in that bottom social feeds *check psd - add class widget-icon to social icons*
- [x] Flickr thumbs need more spacing between each one, 25px *change css*

### About Us, Services, Contact Us:
- [x] In the design we had a block of colour behind the copy and icons, seem to be missing this? *probably still there but need to check colours in psd*

### Project pg:
- [x] Video needs to be full width 1180px *can this be forced or set per post?*

### General:
- [ ] Add SVGs *note: some of these will be directly in sidebar widget*

## Staging

- [x] Create subdomain
- [x] Copy live DB to new DB
- [x] Clone live site
- [x] Local config/content -> menu, pages, carousel

## Go Live

- [ ] Maintenance mode - [plugin](http://wordpress.org/plugins/wp-maintenance-mode/)
- [ ] Backup current live - including screenshots of current config
- [ ] Reconfigure Widget/plugin structure/settings to match local - Sidebar, Carousel (image size = 150x100)
- [ ] Create About, Contact and Service pages via Admin
- [ ] Menu structure via Admin

Client tasks:
- [ ] Load new logos
- [ ] Load new header images
- [ ] Director's tags/menu
- [ ] About, Contact and Service page content