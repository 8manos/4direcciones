=== CG-FlashyTitles ===
Tags: graphic titles, sIFR, image headlines
Contributors: davebytes

CG-FlashyTitles is a plugin whose aim is to make it easier for the WordPress community to use sIFR
Flash-based title replacements on their blogs.  FlashyTitles removes the initial setup complexity,
requiring ZERO modifications to themes/templates or CSS in order to use sIFR replacements.


== Installation ==

1. Upload [cg-flashytitles.php] and the [sifr] folder to your Plugins folder (wp-content/plugins/).
2. From the Admin interface, go to Plugins, and activate the CG-FlashyTitles plugin.
3. Go configure some FlashyTitles! ;)

Note that this release includes/embeds the sIFR 2.0.1 files as part of the CG-FlashyTitles
distribution.  If you need to 'upgrade' the core sIFR files for any reason, they can literally
be uploaded over the matching files in the [sifr] folder.

Also, note that this plugin writes its data to the wp-content/ folder.  That folder must be set
FULLY writeable (at least 666, or owner/group/world writeable).  You will get an error message
if you try to create a FlashyTitle and that directory does not have proper write permissions.

Added for 1.1 is some compatability support for older 1.5-era WP installs.  It might be possible
to support even further back, but 1.5, 1.5.1, and 1.5.1.2 each have different quirks already...


== Configuration ==

Once the plugin is active, you can immediately start making replacements via the CG-FlashyTitles
menu option in the WP Admin interface.  Then click the "Add New sIFR FlashyTitle" button to begin.

The Add and Edit screen are one in the same.  The first field in the form is key: the CSS Selector.
This is the CSS style that you want to have replaced with a sIFR font.  Usually, you'd want to start
with something easy, like "h1" (without the quotes!).  For most WordPress blogs, that will take over
the blog title with the selected replacement font.  Depending on your theme, you'll find "h2" or "h3"
to be good starting points as well, to replace all the post-titles with a sIFR font.  So, pick what
CSS selector you want to replace.

Next, from the sIFR font dropdown list, pick the font you'd like to use.  Along the right side of the
screen is a floating box showing the file names and 'live' samples of each font file that is currently
installed.  Remember, this is just a test, so just pick one. ;)

Next?  Well, for a quick test, you can be done at this point.  About the only thing you might need
is the Knockout 'tweak' field: you can use "transparent" (again, without the quotes!).  Note that
some browsers that don't like transparent Flash movies, AND they do slow machines down further,
so if you have a fixed-color behind the title(s), you are better off leaving the Knockout field
blank (defaults to opaque), and instead set the Background color higher up to match your normal
CSS background color.  But if the text is on a gradient or image (Kubrick, et al), you may need
to use "transparent" for things to look okay.

We're done.  Click the "Save Changes" button.  Then go to "View Site" and look at the result.

NOTE: if you clicked Save Changes and got an error that the file couldn't be saved, make sure
your wp-content/ directory is FULLY writeable.  I've seen sites that needed world-write privs
in order to write to the folder.

Now, you may have noticed there was an "Apply & Continue" button in the Add/Edit screen.  This
is so you can keep two windows open, one with the Add/Edit screen, one with your website, and
do "Apply" in the Add/Edit screen, then Refresh the website page.  This allows for VERY rapid
iteration of tweaks/changes, which might otherwise have been an incredible pain (requiring
editing of the CSS or template files...).

sIFR is still in its infancy, and making it 'look perfect' is an artform rather than a science.
It may take some time and experimentation (and future work by the sIFR folks) for some types
of replacements to 'work well' -- I've run into this myself.  Still, it gives you a level of
font selection otherwise requiring static images, or dynamically-generated images, which both
have their issues and limitations as well.

If you want a custom string printed out for the samples, create a file named:
  cg-flashytitles-sample.txt
... with a SHORT text string, and put it into your /wp-content directory.  Upon the next
refresh of the page, the file will be picked up, and the new sample string used.

If everything works fine in the Admin panel, but the plugin doesn't seem to be affecting your
site visuals, you need to make sure that your theme has the proper header and footer hooks.
Inside the <head> block should be a:
	do_action('wp_head', '');
call, or something like it.  In the footer at the end of the body, you should have a:
	do_action('wp_footer', '');
call as well.

Most modern themes should have those calls already (or something similar-looking).  Without
those actions/hooks, I can't automagically insert myself.  If your theme is missing the
wp_head/wp_footer hooks (evident by no changes on your site), you'll need to make them
yourself.  You can also verify that those hooks do or don't exist by looking at the source
of the page with FlashyTitles active.  The head section should have a bunch of includes
from the sifr/ folder, and the end of the page will have a SCRIPT block doing the replacements.


== Detailing all the options ==

The sIFR options are both self-explanatory on one level, and on another level some require plain
experimentation to actually understand what they do.  For the moment, I'm leaning on them being
reasonably self-explanatory. ;)

It should be noted that I haven't gone out of my way to 'muck with' the options normally used
by sIFR sample code.  That is to say that the options in the Add/Edit screen are exactly those
available through the normal use of the sIFR scripts and CSS overrides, nothing missing, nothing
new.  So reading the actual sIFR docs, and the actual javascript replacement call arguments, will
probably do a better job detailing the options than I ever could!


== Installing additional fonts ==

I've kept the original two fonts from the sIFR 2.0.1 distribution, and was planning to supplement
them with a selection of sIFR font files I found online -- but those 'extra' fonts turned out to
have license issues.  So, for the moment, just the base two fonts are included.

The availability of free sIFR font files grows daily, as there are simply tons free TrueType fonts
and foundries on the internet.  And I'm working on converting them to sIFR.  Want more?  Check out:

http://www.chait.net/free-sifr-fonts/ (starting my own 'clean' library)
 and
http://www.isarie.com/index.php?p=17 (a huge library, but all of unknown license)

You may need to right click and "Save target as..." in order to grab SWF files rather than the browser
trying to open the Flash file directly.  I'd lean toward zipped files, as they should contain some
history/license of the original font. ;)

To install a sIFR font for CG-FlashyTitles, all you need to do is upload the SWF file to the [sifr]
folder (should be at wp-content/plugins/sifr/).  When you next go into the Add/Edit screen, the new
font(s) will be listed in the dropdown and along the right side of the screen.  Note that for your
own sanity, you probably want to keep to maybe a half-dozen or so fonts maximum, or the lists will
be a bit much. ;)

CAVEAT: Like most 'free font' files, SWF fonts will certainly have the risk of being commercial
font derivatives rather than actual freeware or public domain fonts.  That's why I'm building my
own base of known >free< fonts, that can be cataloged with the 'authenticity' intact.  Keep an eye
out for my progress on that front. ;)


== How it works ==

CG-FlashyTitle does a little magic, taking care of the two 'hooks' necessary for sIFR to do its job:

1. When a WordPress page is loading, CG-FlashyTitles inserts the proper references to load the sIFR
'base' CSS files, and then dynamically generates the additional CSS needed to override your base CSS
with the FlashyTitles you have defined.

2. At the end of a WordPress page load, CG-FlashyTitles dynamically inserts the necessary Javascript
calls that do the 'heavy lifting' of the sIFR replacement mechanism, one call for each FlashyTitle.

The Admin Add/Edit interface actually does the same thing, and then dynamically creates the list
of fonts from the [sifr] folder, and dynamically generates CSS wrappering and output for the font
list so that it is 'live' replaced by sIFR (those aren't JPGs, they are sIFR actually running
in the Admin interface...).

New for 1.1 is cleanup when the plugin is active but there are no replacement rules -- the plugin
will no longer output ANY style or script information into the page, so you don't have any output
overhead when there's no rules.


== Support ==

Reminder that CG-FlashTitles is a 'helper' that just bundles sIFR up and makes it easier to
start using.  Most of your questions and issues will likely be with display bugs, or getting
things to look good, which are outside of my control (unfortunately).

However, there is a thriving support community for sIFR-spefici questions, if you have any
problems with sIFR functionality.  The sIFR Support Forum is housed at:
http://forum.textdrive.com/viewforum.php?id=20

If you have questions related to CG-FlashyTitles, or ideas for improvements, you can post
in the WordPress forums, contact me through my site (http://www.chait.net), or email me
directly at cgcode @ chait.net.


== Frequently Asked Questions ==

= Where can I find more details on sIFR =

Go to the source of all things sIFR: http://www.mikeindustries.com/sifr/

= How do I turn it off? =

Just de-activate the CG-FlashyTitles plugin, and your site will load without sIFR replacements.
A future release may include an enable/disable option per FlashyTitle.  I'm also considering
adding a support option for live 'rolling back' the sIFR replacements so you can quickly see the
site 'clean', without having to disable the plugin.

= Why use CG-FlashyTitles? =

CG-FlashyTitles makes it a breeze to start using slick looking sIFR-based fonts on your website.
And don't we all want WordPress sites to be the best looking blogs on the planet?

Also, sIFR is another "TextDrive project", so I thought I'd help 'drive' further adoption. ;)

But really, I wanted to 'enable' people to use sIFR as painlessly as possible.  CG-FlashyTitles is a
first attempt to make things a bit easier -- no doubt, it'll improve over time.
 
= Couldn't I just install sIFR 2.0 myself? =

You certainly can!  But since I had problems getting over the initial 'learning curve' of exactly what
needed to be installed and done, I figured others would too -- especially those non-programmers who have
trouble editing theme/template files.

As it turns out, sIFR normally requires hand-editing CSS for each title replacement you want to do, as
well as then adding a call to a Javascript function for each replacement.  That can be awfully daunting
for the non-programmers out there, and is complex enough that introducing errors could be common.

So I came up with FlashyTitles as an awesome way to bridge the gap between all the initial install and
site-code setup issues, and actually having sIFR replacement >running< on your site.  FlashyTitles should
allow people to have a sIFR replacement working on their site in a minute or two... and then spend hours
tearing their hair out over font selection and 'fitting/sizing' tweaks rather than the basic setup stuff.

If you do install sIFR 'manually', disable CG-FlashyTitles as they will conflict.

= What's next? =

I've thought about having per-category rules, or something of that nature -- would allow you to style
your site differently based on category, or maybe the is_home, is_single, etc. page types.


== Screenshots ==

1. This screenshot shows the main CG-FlashyTitles Admin screen, with two active replacements.
2. This screenshot shows the CG-FlashyTitles Edit screen, including samples of installed fonts.
3. This screenshot shows my 'PagesOnly' theme/plugin, without sIFR active.
4. This screenshot shows the same theme with CG-FlashyTitles sIFR replacements.
