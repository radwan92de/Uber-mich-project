<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "lib_jquery".
 *
 * Auto generated 06-10-2017 02:32
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array (
  'title' => 'JS Library: jQuery',
  'description' => 'Integrates the jQuery-library from CDN with a local fallback if requested library is not available. All relevant versions of jQuery (including minified and gzipped-versions) are shipped with this extension.',
  'category' => 'misc',
  'version' => '1.0.0',
  'state' => 'stable',
  'uploadfolder' => false,
  'createDirs' => '',
  'clearcacheonload' => true,
  'author' => 'Stephan Kellermayr',
  'author_email' => 'stephan.kellermayr@gmail.com',
  'author_company' => 'sonority.at - MULTIMEDIA ART DESIGN',
  'constraints' => 
  array (
    'depends' => 
    array (
      'typo3' => '6.2.0-7.6.99',
    ),
    'conflicts' => 
    array (
    ),
    'suggests' => 
    array (
    ),
  ),
);

