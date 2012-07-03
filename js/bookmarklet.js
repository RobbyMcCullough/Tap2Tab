<?php
$bookmarkletJs = <<<EOT
javascript: function tap2tab() {
    var d = document,
        z = d.createElement('scr' + 'ipt'),
        b = d.body,
        l = d.location;
    try {
        if (!b) throw (0);
        z.setAttribute('src', l.protocol + '//<?=$userName?>.tap2tab.com/?page=' + encodeURIComponent(l.href)+'&t='+(new Date().getTime()));
        b.appendChild(z);
    } catch (e) {
        alert('Please wait until the page has loaded.');
    }
}
tap2tab();
void(0)
EOT;
$bookmarkletJs = str_replace($bookmarkletJs, "\r\n", '');
?>