<% if $CCSSAsRaw %>
<style>$CCSSAsRaw.RAW</style>
<noscript>
    <link rel="stylesheet" href="{$ThemeDir}/dist/css/styles.min.css?built=1590149632959"/>
</noscript>
<script>
    (function (win, doc) {
        'use strict';

        function loadCSS(e) {
            function t() {
                var e, n;
                for (n = 0; n < l.length; n += 1) l[n].href && l[n].href.indexOf(r.href) > -1 && (e = !0);
                e ? r.media = "all" : win.setTimeout(t)
            }

            var r = doc.createElement("link"), n = doc.getElementsByTagName("script")[0], l = doc.styleSheets;
            return r.rel = "stylesheet", r.href = e, r.media = "only x", n.parentNode.insertBefore(r, n), t(), r
        }

        loadCSS("{$MainCSSPath}?built=1590149632959");
        doc.cookie = 'ccsscookie={$CCSSCookieVersion};expires="Tue, 19 Jan 2038 03:14:07 GMT";path=/';
    }(this, this.document));
</script>

<% if $isDev %>
    <%-- link rel="stylesheet" href="{$ThemeDir}/src/precss/styles.concat.css?built=1590149632959" --%>
<% end_if %>

<% else %>
    <% if $isDev %>
        <link rel="stylesheet" href="{$ThemeDir}/src/precss/styles.concat.css?built=1590149632959">
    <% else %>
        <link rel="stylesheet" href="{$ThemeDir}/dist/css/styles.min.css?built=1590149632959">
    <% end_if %>
<% end_if %>

