<?php

$html = '<span itemprop="creator" itemscope itemtype="http://schema.org/Person"><span>%1$s</span><span itemprop="contactPoint"><span itemprop="name">%2$s</span> | <a href="%4$s" title="%3$s" itemprop="url" target="_blank">%5$s</a></span></span>';
printf(
	$html,
	'Design &amp; Code by ',
	'Daniel Sitek',
	'Hi, I’m Daniel and I craft websites & web apps',
	'https://danielsitek.cz',
	'danielsitek.cz'
);
