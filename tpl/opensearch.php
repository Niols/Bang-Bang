<?php

header('Content-Type: application/opensearchdescription+xml');

?><?xml version="1.0" encoding="utf-8"?>
<OpenSearchDescription xmlns="http://a9.com/-/spec/opensearch/1.1/"> 
  <ShortName><?= Config::get('site.title') ?></ShortName> 
  <Description><?= Config::get('site.description') ?></Description> 
  <InputEncoding>UTF-8</InputEncoding> 
  <OutputEncoding>UTF-8</OutputEncoding>
  <LongName>Niols Bang Bang Bang Provider</LongName>
  <Developer>Niols &lt;niols@niols.fr&gt;</Developer>
  <Image height="16" width="16" type="image/x-icon"><?= Config::get('site.url') ?>/img/favicon.ico</Image>
  <Image height="64" width="64" type="image/png"><?= Config::get('site.url') ?>/img/favicon-64.png</Image>
  <Url type="text/html" method="get" template="<?= Config::get('site.url') ?>/?search={searchTerms}" />
</OpenSearchDescription> 
