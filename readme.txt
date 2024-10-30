=== Plugin Name ===
Contributors: createyourleague
Donate link: http://www.createyourleague.com/donations
Tags: fixtures, ranking, league, championship, code, plugin, shortcode, risultati, classifica, genera calendario, classifica marcatori, top scorers, football, soccer, calcio, basket, gestione campionato, risultatieclassifiche, createyourleague
Requires at least: 2.5
Tested up to: 3.3
Stable tag: 1.1

Create Your League is a completely FREE service that allows you to publish the ranking table of your league directly to your WordPress web site.

== Description ==

Create Your League is a completely FREE service that allows you to publish the ranking table of your league directly to your WordPress web site. Sign Up to http://www.createyourleague.com (oppure in italiano qui http://www.risultatieclassifiche.net/ ) and manage any league: soccer, football, basket, volley ball and other sports that have a ranking chart.

After you have signed up, you can create your championship, add teams, fixtures and get the ranking table. The ranking chart and the fixtures can be published on your website pasting a simple code.

The following shortcodes are available:

*   `[createyourleague id=xxx]`: shows ranking table, id is the code id (you can get on it on or website control panel)
*   `[createyourleague_days id=xxx]`: shows fixtures calendar.
*   `[createyourleague_topscorers id=xxx]`: show top scorers chart.

    The default language is english. You can get italian language using `lang` variable like this:
    
    `[createyourleague id=xxx lang="it"]`

You can get the codes easily on our website control panel.
    
`[createyourleague_days id=xxx]` accepts also the following parameters:
*   two_columns: if set to 1 will render fixtures in two columns. (example `[createyourleague_days id=xxx two_columns=1]`)
*   order: "a" for ascending order or "d" for descending order. (example `[createyourleague_days id=xxx order="a"]`)
*   limit: limits the number of days to show. (example `[createyourleague_days id=xxx limit=5]`)
*   day: shows only the day selected (example `[createyourleague_days id=xxx day=3]`)

== Installation ==

1. Download and unpack .zip file
2. Upload create-your-league directory to wp-contents/plugins directory
3. Active in the plugins page of the admin area

Alternatively install directly from the WordPress admin panel.

Once installed, you need to sign up at http://www.createyourleague.com/ or http://www.risultatieclassifiche.net/ for italian language and manage your data (insert teams, fixtures, results etc.) After that you can use shortcodes described in "description" section.

== Frequently Asked Questions ==

= How do I manage championship?
You need to register to http://www.createyourleague.com/ or http://www.risultatieclassifiche.net/ (for italian).
Once registered you can use all functions.

= How do I publish my championship data in Wordpress?
After generating data on http://www.createyourleague.com/ or http://www.risultatieclassifiche.net/ (for italian) 
you can publish in Wordpress using shortcodes present in "Codes" section.

= I have difficulties using your plugin, how can I contact you? =

You can ask for support here: http://www.createyourleague.com/contact-us
or in italian here http://www.risultatieclassifiche.net/contattaci

== Screenshots ==

1. Ranking table.
2. Fixtures extract.

== Changelog ==

= 1.1 =
* fixed bug in topscorers

= 1.0 =
* fixed error when php setting allow_fopen_url is off

= 0.4 =
* added new parameters to createyourleague_days

= 0.3 =
* fixes readme

= 0.2 =
* fixed readme

= 0.1 =
* First release

== Upgrade Notice ==

= 0.4 =
No notices

= 0.3 =
No notices

