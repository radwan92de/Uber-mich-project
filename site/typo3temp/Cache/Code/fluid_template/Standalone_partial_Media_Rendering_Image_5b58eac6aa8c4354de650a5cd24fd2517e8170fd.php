<?php
class FluidCache_Standalone_partial_Media_Rendering_Image_5b58eac6aa8c4354de650a5cd24fd2517e8170fd extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// @todo
	return new \TYPO3\CMS\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$self = $this;

return NULL;
}
public function hasLayout() {
return FALSE;
}

/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();

$output0 = '';

$output0 .= '<img src="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper
$arguments1 = array();
$arguments1['src'] = 'EXT:bootstrap_package/Resources/Public/Images/blank.gif';
$arguments1['image'] = NULL;
$arguments1['width'] = NULL;
$arguments1['height'] = NULL;
$arguments1['minWidth'] = NULL;
$arguments1['minHeight'] = NULL;
$arguments1['maxWidth'] = NULL;
$arguments1['maxHeight'] = NULL;
$arguments1['treatIdAsReference'] = false;
$arguments1['crop'] = NULL;
$arguments1['absolute'] = false;
$renderChildrenClosure2 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '"
     data-src="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper
$arguments3 = array();
$arguments3['image'] = $currentVariableContainer->getOrNull('file');
$arguments3['src'] = NULL;
$arguments3['width'] = NULL;
$arguments3['height'] = NULL;
$arguments3['minWidth'] = NULL;
$arguments3['minHeight'] = NULL;
$arguments3['maxWidth'] = NULL;
$arguments3['maxHeight'] = NULL;
$arguments3['treatIdAsReference'] = false;
$arguments3['crop'] = NULL;
$arguments3['absolute'] = false;
$renderChildrenClosure4 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper::renderStatic($arguments3, $renderChildrenClosure4, $renderingContext);

$output0 .= '"
     data-bigger="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper
$arguments5 = array();
$arguments5['image'] = $currentVariableContainer->getOrNull('file');
$arguments5['maxWidth'] = '1140';
$arguments5['src'] = NULL;
$arguments5['width'] = NULL;
$arguments5['height'] = NULL;
$arguments5['minWidth'] = NULL;
$arguments5['minHeight'] = NULL;
$arguments5['maxHeight'] = NULL;
$arguments5['treatIdAsReference'] = false;
$arguments5['crop'] = NULL;
$arguments5['absolute'] = false;
$renderChildrenClosure6 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper::renderStatic($arguments5, $renderChildrenClosure6, $renderingContext);

$output0 .= '"
     data-large="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper
$arguments7 = array();
$arguments7['image'] = $currentVariableContainer->getOrNull('file');
$arguments7['maxWidth'] = '940';
$arguments7['src'] = NULL;
$arguments7['width'] = NULL;
$arguments7['height'] = NULL;
$arguments7['minWidth'] = NULL;
$arguments7['minHeight'] = NULL;
$arguments7['maxHeight'] = NULL;
$arguments7['treatIdAsReference'] = false;
$arguments7['crop'] = NULL;
$arguments7['absolute'] = false;
$renderChildrenClosure8 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper::renderStatic($arguments7, $renderChildrenClosure8, $renderingContext);

$output0 .= '"
     data-medium="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper
$arguments9 = array();
$arguments9['image'] = $currentVariableContainer->getOrNull('file');
$arguments9['maxWidth'] = '720';
$arguments9['src'] = NULL;
$arguments9['width'] = NULL;
$arguments9['height'] = NULL;
$arguments9['minWidth'] = NULL;
$arguments9['minHeight'] = NULL;
$arguments9['maxHeight'] = NULL;
$arguments9['treatIdAsReference'] = false;
$arguments9['crop'] = NULL;
$arguments9['absolute'] = false;
$renderChildrenClosure10 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper::renderStatic($arguments9, $renderChildrenClosure10, $renderingContext);

$output0 .= '"
     data-small="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper
$arguments11 = array();
$arguments11['image'] = $currentVariableContainer->getOrNull('file');
$arguments11['maxWidth'] = '320';
$arguments11['src'] = NULL;
$arguments11['width'] = NULL;
$arguments11['height'] = NULL;
$arguments11['minWidth'] = NULL;
$arguments11['minHeight'] = NULL;
$arguments11['maxHeight'] = NULL;
$arguments11['treatIdAsReference'] = false;
$arguments11['crop'] = NULL;
$arguments11['absolute'] = false;
$renderChildrenClosure12 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper::renderStatic($arguments11, $renderChildrenClosure12, $renderingContext);

$output0 .= '"
     title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments13 = array();
$arguments13['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'title', $renderingContext);
$arguments13['keepQuotes'] = false;
$arguments13['encoding'] = NULL;
$arguments13['doubleEncode'] = true;
$renderChildrenClosure14 = function() {return NULL;};
$value15 = ($arguments13['value'] !== NULL ? $arguments13['value'] : $renderChildrenClosure14());

$output0 .= (!is_string($value15) ? $value15 : htmlspecialchars($value15, ($arguments13['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments13['encoding'] !== NULL ? $arguments13['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments13['doubleEncode']));

$output0 .= '"
     alt="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments16 = array();
$arguments16['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'alternative', $renderingContext);
$arguments16['keepQuotes'] = false;
$arguments16['encoding'] = NULL;
$arguments16['doubleEncode'] = true;
$renderChildrenClosure17 = function() {return NULL;};
$value18 = ($arguments16['value'] !== NULL ? $arguments16['value'] : $renderChildrenClosure17());

$output0 .= (!is_string($value18) ? $value18 : htmlspecialchars($value18, ($arguments16['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments16['encoding'] !== NULL ? $arguments16['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments16['doubleEncode']));

$output0 .= '"
     class="lazyload"
     data-preload="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments19 = array();
// Rendering Boolean node
$arguments19['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'media.preload', $renderingContext));
$arguments19['then'] = 'true';
$arguments19['else'] = 'false';
$renderChildrenClosure20 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments19, $renderChildrenClosure20, $renderingContext);

$output0 .= '"
     />
<noscript>
    <img src="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper
$arguments21 = array();
$arguments21['image'] = $currentVariableContainer->getOrNull('file');
$arguments21['src'] = NULL;
$arguments21['width'] = NULL;
$arguments21['height'] = NULL;
$arguments21['minWidth'] = NULL;
$arguments21['minHeight'] = NULL;
$arguments21['maxWidth'] = NULL;
$arguments21['maxHeight'] = NULL;
$arguments21['treatIdAsReference'] = false;
$arguments21['crop'] = NULL;
$arguments21['absolute'] = false;
$renderChildrenClosure22 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper::renderStatic($arguments21, $renderChildrenClosure22, $renderingContext);

$output0 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments23 = array();
$arguments23['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'title', $renderingContext);
$arguments23['keepQuotes'] = false;
$arguments23['encoding'] = NULL;
$arguments23['doubleEncode'] = true;
$renderChildrenClosure24 = function() {return NULL;};
$value25 = ($arguments23['value'] !== NULL ? $arguments23['value'] : $renderChildrenClosure24());

$output0 .= (!is_string($value25) ? $value25 : htmlspecialchars($value25, ($arguments23['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments23['encoding'] !== NULL ? $arguments23['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments23['doubleEncode']));

$output0 .= '" alt="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments26 = array();
$arguments26['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'alternative', $renderingContext);
$arguments26['keepQuotes'] = false;
$arguments26['encoding'] = NULL;
$arguments26['doubleEncode'] = true;
$renderChildrenClosure27 = function() {return NULL;};
$value28 = ($arguments26['value'] !== NULL ? $arguments26['value'] : $renderChildrenClosure27());

$output0 .= (!is_string($value28) ? $value28 : htmlspecialchars($value28, ($arguments26['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments26['encoding'] !== NULL ? $arguments26['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments26['doubleEncode']));

$output0 .= '" />
</noscript>
';


return $output0;
}


}
#1507522019    10095     