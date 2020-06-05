# ss-template-cache-helper
Some helpers for Silverstripe in order to simplify the usage of critical css usage.


### How it works
This module does not work alone. The other part is using webpack or grunt for the front end resources. During building 
the package we need to generate critical css-files for each page type in Silverstripe. This is done by using phantom js, or penthouse
or similar. This module allows for a simpler way of using those files. Add the generated critical css-files path in the config.yml  

## Features

* Point out the critical css folder for all page types 

### Example 

For Sitewide caching, for instance in the `<footer>` part of the site
```html
<% cached "page-footer", $TemplateSitewideCacheKey %>
    <footer>
        <p>$SiteConfig.FooterText</p>
    </footer>
<% end_cached % 
```

Page specific page cache, in this instance we add it to the page.ss template.
```html
<% cached "page", $TemplatePageCacheKey %>
    <% include SideBar %>
    <div class="main">
        <h1>$Title</h1>
        <div class="typography">
            $Content    
        </div>
    </div>
<% end_cached %>
```
