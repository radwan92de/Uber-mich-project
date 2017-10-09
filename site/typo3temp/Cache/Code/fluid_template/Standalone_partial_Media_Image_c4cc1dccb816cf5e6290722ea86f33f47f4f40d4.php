<?php
class FluidCache_Standalone_partial_Media_Image_c4cc1dccb816cf5e6290722ea86f33f47f4f40d4 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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

$output0 .= '
<figure class="image">
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'link', $renderingContext));
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output3 = '';

$output3 .= '
        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments4 = array();
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output6 = '';

$output6 .= '
            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\TypolinkViewHelper
$arguments7 = array();
$arguments7['parameter'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'link', $renderingContext);
$arguments7['title'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'title', $renderingContext);
$arguments7['target'] = '';
$arguments7['class'] = '';
$arguments7['additionalParams'] = '';
$arguments7['additionalAttributes'] = array (
);
$renderChildrenClosure8 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output9 = '';

$output9 .= '
                ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments10 = array();
$arguments10['partial'] = 'Media/Rendering/Image';
// Rendering Array
$array11 = array();
$array11['file'] = $currentVariableContainer->getOrNull('file');
$array11['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments10['arguments'] = $array11;
$arguments10['section'] = NULL;
$arguments10['optional'] = false;
$renderChildrenClosure12 = function() {return NULL;};

$output9 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments10, $renderChildrenClosure12, $renderingContext);

$output9 .= '
            ';
return $output9;
};

$output6 .= TYPO3\CMS\Fluid\ViewHelpers\Link\TypolinkViewHelper::renderStatic($arguments7, $renderChildrenClosure8, $renderingContext);

$output6 .= '
        ';
return $output6;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments4, $renderChildrenClosure5, $renderingContext);

$output3 .= '
        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments13 = array();
$renderChildrenClosure14 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output15 = '';

$output15 .= '
            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments16 = array();
// Rendering Boolean node
$arguments16['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('data'), 'image_zoom', $renderingContext));
$arguments16['then'] = NULL;
$arguments16['else'] = NULL;
$renderChildrenClosure17 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output18 = '';

$output18 .= '
                ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments19 = array();
$renderChildrenClosure20 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output21 = '';

$output21 .= '
                    <a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper
$arguments22 = array();
$arguments22['image'] = $currentVariableContainer->getOrNull('file');
$arguments22['maxHeight'] = '1200';
$arguments22['maxWidth'] = '1200';
$arguments22['src'] = NULL;
$arguments22['width'] = NULL;
$arguments22['height'] = NULL;
$arguments22['minWidth'] = NULL;
$arguments22['minHeight'] = NULL;
$arguments22['treatIdAsReference'] = false;
$arguments22['crop'] = NULL;
$arguments22['absolute'] = false;
$renderChildrenClosure23 = function() {return NULL;};

$output21 .= TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper::renderStatic($arguments22, $renderChildrenClosure23, $renderingContext);

$output21 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments24 = array();
$arguments24['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'title', $renderingContext);
$arguments24['keepQuotes'] = false;
$arguments24['encoding'] = NULL;
$arguments24['doubleEncode'] = true;
$renderChildrenClosure25 = function() {return NULL;};
$value26 = ($arguments24['value'] !== NULL ? $arguments24['value'] : $renderChildrenClosure25());

$output21 .= (!is_string($value26) ? $value26 : htmlspecialchars($value26, ($arguments24['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments24['encoding'] !== NULL ? $arguments24['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments24['doubleEncode']));

$output21 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments27 = array();
$arguments27['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'lightbox.cssClass', $renderingContext);
$arguments27['keepQuotes'] = false;
$arguments27['encoding'] = NULL;
$arguments27['doubleEncode'] = true;
$renderChildrenClosure28 = function() {return NULL;};
$value29 = ($arguments27['value'] !== NULL ? $arguments27['value'] : $renderChildrenClosure28());

$output21 .= (!is_string($value29) ? $value29 : htmlspecialchars($value29, ($arguments27['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments27['encoding'] !== NULL ? $arguments27['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments27['doubleEncode']));

$output21 .= '" data-lightbox-width="';
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper
$arguments30 = array();
$arguments30['property'] = 'width';
$renderChildrenClosure31 = function() {return NULL;};

$output21 .= BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper::renderStatic($arguments30, $renderChildrenClosure31, $renderingContext);

$output21 .= '" data-lightbox-height="';
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper
$arguments32 = array();
$arguments32['property'] = 'height';
$renderChildrenClosure33 = function() {return NULL;};

$output21 .= BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper::renderStatic($arguments32, $renderChildrenClosure33, $renderingContext);

$output21 .= '" rel="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments34 = array();
$arguments34['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'lightbox.prefix', $renderingContext);
$arguments34['keepQuotes'] = false;
$arguments34['encoding'] = NULL;
$arguments34['doubleEncode'] = true;
$renderChildrenClosure35 = function() {return NULL;};
$value36 = ($arguments34['value'] !== NULL ? $arguments34['value'] : $renderChildrenClosure35());

$output21 .= (!is_string($value36) ? $value36 : htmlspecialchars($value36, ($arguments34['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments34['encoding'] !== NULL ? $arguments34['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments34['doubleEncode']));

$output21 .= '-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments37 = array();
$arguments37['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('data'), 'uid', $renderingContext);
$arguments37['keepQuotes'] = false;
$arguments37['encoding'] = NULL;
$arguments37['doubleEncode'] = true;
$renderChildrenClosure38 = function() {return NULL;};
$value39 = ($arguments37['value'] !== NULL ? $arguments37['value'] : $renderChildrenClosure38());

$output21 .= (!is_string($value39) ? $value39 : htmlspecialchars($value39, ($arguments37['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments37['encoding'] !== NULL ? $arguments37['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments37['doubleEncode']));

$output21 .= '">
                        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments40 = array();
$arguments40['partial'] = 'Media/Rendering/Image';
// Rendering Array
$array41 = array();
$array41['file'] = $currentVariableContainer->getOrNull('file');
$array41['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments40['arguments'] = $array41;
$arguments40['section'] = NULL;
$arguments40['optional'] = false;
$renderChildrenClosure42 = function() {return NULL;};

$output21 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments40, $renderChildrenClosure42, $renderingContext);

$output21 .= '
                    </a>
                ';
return $output21;
};

$output18 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments19, $renderChildrenClosure20, $renderingContext);

$output18 .= '
                ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments43 = array();
$renderChildrenClosure44 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output45 = '';

$output45 .= '
                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments46 = array();
$arguments46['partial'] = 'Media/Rendering/Image';
// Rendering Array
$array47 = array();
$array47['file'] = $currentVariableContainer->getOrNull('file');
$array47['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments46['arguments'] = $array47;
$arguments46['section'] = NULL;
$arguments46['optional'] = false;
$renderChildrenClosure48 = function() {return NULL;};

$output45 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments46, $renderChildrenClosure48, $renderingContext);

$output45 .= '
                ';
return $output45;
};

$output18 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments43, $renderChildrenClosure44, $renderingContext);

$output18 .= '
            ';
return $output18;
};
$arguments16['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output49 = '';

$output49 .= '
                    <a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper
$arguments50 = array();
$arguments50['image'] = $currentVariableContainer->getOrNull('file');
$arguments50['maxHeight'] = '1200';
$arguments50['maxWidth'] = '1200';
$arguments50['src'] = NULL;
$arguments50['width'] = NULL;
$arguments50['height'] = NULL;
$arguments50['minWidth'] = NULL;
$arguments50['minHeight'] = NULL;
$arguments50['treatIdAsReference'] = false;
$arguments50['crop'] = NULL;
$arguments50['absolute'] = false;
$renderChildrenClosure51 = function() {return NULL;};

$output49 .= TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper::renderStatic($arguments50, $renderChildrenClosure51, $renderingContext);

$output49 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments52 = array();
$arguments52['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'title', $renderingContext);
$arguments52['keepQuotes'] = false;
$arguments52['encoding'] = NULL;
$arguments52['doubleEncode'] = true;
$renderChildrenClosure53 = function() {return NULL;};
$value54 = ($arguments52['value'] !== NULL ? $arguments52['value'] : $renderChildrenClosure53());

$output49 .= (!is_string($value54) ? $value54 : htmlspecialchars($value54, ($arguments52['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments52['encoding'] !== NULL ? $arguments52['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments52['doubleEncode']));

$output49 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments55 = array();
$arguments55['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'lightbox.cssClass', $renderingContext);
$arguments55['keepQuotes'] = false;
$arguments55['encoding'] = NULL;
$arguments55['doubleEncode'] = true;
$renderChildrenClosure56 = function() {return NULL;};
$value57 = ($arguments55['value'] !== NULL ? $arguments55['value'] : $renderChildrenClosure56());

$output49 .= (!is_string($value57) ? $value57 : htmlspecialchars($value57, ($arguments55['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments55['encoding'] !== NULL ? $arguments55['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments55['doubleEncode']));

$output49 .= '" data-lightbox-width="';
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper
$arguments58 = array();
$arguments58['property'] = 'width';
$renderChildrenClosure59 = function() {return NULL;};

$output49 .= BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper::renderStatic($arguments58, $renderChildrenClosure59, $renderingContext);

$output49 .= '" data-lightbox-height="';
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper
$arguments60 = array();
$arguments60['property'] = 'height';
$renderChildrenClosure61 = function() {return NULL;};

$output49 .= BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper::renderStatic($arguments60, $renderChildrenClosure61, $renderingContext);

$output49 .= '" rel="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments62 = array();
$arguments62['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'lightbox.prefix', $renderingContext);
$arguments62['keepQuotes'] = false;
$arguments62['encoding'] = NULL;
$arguments62['doubleEncode'] = true;
$renderChildrenClosure63 = function() {return NULL;};
$value64 = ($arguments62['value'] !== NULL ? $arguments62['value'] : $renderChildrenClosure63());

$output49 .= (!is_string($value64) ? $value64 : htmlspecialchars($value64, ($arguments62['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments62['encoding'] !== NULL ? $arguments62['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments62['doubleEncode']));

$output49 .= '-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments65 = array();
$arguments65['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('data'), 'uid', $renderingContext);
$arguments65['keepQuotes'] = false;
$arguments65['encoding'] = NULL;
$arguments65['doubleEncode'] = true;
$renderChildrenClosure66 = function() {return NULL;};
$value67 = ($arguments65['value'] !== NULL ? $arguments65['value'] : $renderChildrenClosure66());

$output49 .= (!is_string($value67) ? $value67 : htmlspecialchars($value67, ($arguments65['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments65['encoding'] !== NULL ? $arguments65['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments65['doubleEncode']));

$output49 .= '">
                        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments68 = array();
$arguments68['partial'] = 'Media/Rendering/Image';
// Rendering Array
$array69 = array();
$array69['file'] = $currentVariableContainer->getOrNull('file');
$array69['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments68['arguments'] = $array69;
$arguments68['section'] = NULL;
$arguments68['optional'] = false;
$renderChildrenClosure70 = function() {return NULL;};

$output49 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments68, $renderChildrenClosure70, $renderingContext);

$output49 .= '
                    </a>
                ';
return $output49;
};
$arguments16['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output71 = '';

$output71 .= '
                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments72 = array();
$arguments72['partial'] = 'Media/Rendering/Image';
// Rendering Array
$array73 = array();
$array73['file'] = $currentVariableContainer->getOrNull('file');
$array73['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments72['arguments'] = $array73;
$arguments72['section'] = NULL;
$arguments72['optional'] = false;
$renderChildrenClosure74 = function() {return NULL;};

$output71 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments72, $renderChildrenClosure74, $renderingContext);

$output71 .= '
                ';
return $output71;
};

$output15 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments16, $renderChildrenClosure17, $renderingContext);

$output15 .= '
        ';
return $output15;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments13, $renderChildrenClosure14, $renderingContext);

$output3 .= '
    ';
return $output3;
};
$arguments1['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output75 = '';

$output75 .= '
            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\TypolinkViewHelper
$arguments76 = array();
$arguments76['parameter'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'link', $renderingContext);
$arguments76['title'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'title', $renderingContext);
$arguments76['target'] = '';
$arguments76['class'] = '';
$arguments76['additionalParams'] = '';
$arguments76['additionalAttributes'] = array (
);
$renderChildrenClosure77 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output78 = '';

$output78 .= '
                ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments79 = array();
$arguments79['partial'] = 'Media/Rendering/Image';
// Rendering Array
$array80 = array();
$array80['file'] = $currentVariableContainer->getOrNull('file');
$array80['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments79['arguments'] = $array80;
$arguments79['section'] = NULL;
$arguments79['optional'] = false;
$renderChildrenClosure81 = function() {return NULL;};

$output78 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments79, $renderChildrenClosure81, $renderingContext);

$output78 .= '
            ';
return $output78;
};

$output75 .= TYPO3\CMS\Fluid\ViewHelpers\Link\TypolinkViewHelper::renderStatic($arguments76, $renderChildrenClosure77, $renderingContext);

$output75 .= '
        ';
return $output75;
};
$arguments1['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output82 = '';

$output82 .= '
            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments83 = array();
// Rendering Boolean node
$arguments83['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('data'), 'image_zoom', $renderingContext));
$arguments83['then'] = NULL;
$arguments83['else'] = NULL;
$renderChildrenClosure84 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output85 = '';

$output85 .= '
                ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments86 = array();
$renderChildrenClosure87 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output88 = '';

$output88 .= '
                    <a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper
$arguments89 = array();
$arguments89['image'] = $currentVariableContainer->getOrNull('file');
$arguments89['maxHeight'] = '1200';
$arguments89['maxWidth'] = '1200';
$arguments89['src'] = NULL;
$arguments89['width'] = NULL;
$arguments89['height'] = NULL;
$arguments89['minWidth'] = NULL;
$arguments89['minHeight'] = NULL;
$arguments89['treatIdAsReference'] = false;
$arguments89['crop'] = NULL;
$arguments89['absolute'] = false;
$renderChildrenClosure90 = function() {return NULL;};

$output88 .= TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper::renderStatic($arguments89, $renderChildrenClosure90, $renderingContext);

$output88 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments91 = array();
$arguments91['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'title', $renderingContext);
$arguments91['keepQuotes'] = false;
$arguments91['encoding'] = NULL;
$arguments91['doubleEncode'] = true;
$renderChildrenClosure92 = function() {return NULL;};
$value93 = ($arguments91['value'] !== NULL ? $arguments91['value'] : $renderChildrenClosure92());

$output88 .= (!is_string($value93) ? $value93 : htmlspecialchars($value93, ($arguments91['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments91['encoding'] !== NULL ? $arguments91['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments91['doubleEncode']));

$output88 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments94 = array();
$arguments94['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'lightbox.cssClass', $renderingContext);
$arguments94['keepQuotes'] = false;
$arguments94['encoding'] = NULL;
$arguments94['doubleEncode'] = true;
$renderChildrenClosure95 = function() {return NULL;};
$value96 = ($arguments94['value'] !== NULL ? $arguments94['value'] : $renderChildrenClosure95());

$output88 .= (!is_string($value96) ? $value96 : htmlspecialchars($value96, ($arguments94['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments94['encoding'] !== NULL ? $arguments94['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments94['doubleEncode']));

$output88 .= '" data-lightbox-width="';
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper
$arguments97 = array();
$arguments97['property'] = 'width';
$renderChildrenClosure98 = function() {return NULL;};

$output88 .= BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper::renderStatic($arguments97, $renderChildrenClosure98, $renderingContext);

$output88 .= '" data-lightbox-height="';
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper
$arguments99 = array();
$arguments99['property'] = 'height';
$renderChildrenClosure100 = function() {return NULL;};

$output88 .= BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper::renderStatic($arguments99, $renderChildrenClosure100, $renderingContext);

$output88 .= '" rel="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments101 = array();
$arguments101['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'lightbox.prefix', $renderingContext);
$arguments101['keepQuotes'] = false;
$arguments101['encoding'] = NULL;
$arguments101['doubleEncode'] = true;
$renderChildrenClosure102 = function() {return NULL;};
$value103 = ($arguments101['value'] !== NULL ? $arguments101['value'] : $renderChildrenClosure102());

$output88 .= (!is_string($value103) ? $value103 : htmlspecialchars($value103, ($arguments101['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments101['encoding'] !== NULL ? $arguments101['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments101['doubleEncode']));

$output88 .= '-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments104 = array();
$arguments104['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('data'), 'uid', $renderingContext);
$arguments104['keepQuotes'] = false;
$arguments104['encoding'] = NULL;
$arguments104['doubleEncode'] = true;
$renderChildrenClosure105 = function() {return NULL;};
$value106 = ($arguments104['value'] !== NULL ? $arguments104['value'] : $renderChildrenClosure105());

$output88 .= (!is_string($value106) ? $value106 : htmlspecialchars($value106, ($arguments104['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments104['encoding'] !== NULL ? $arguments104['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments104['doubleEncode']));

$output88 .= '">
                        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments107 = array();
$arguments107['partial'] = 'Media/Rendering/Image';
// Rendering Array
$array108 = array();
$array108['file'] = $currentVariableContainer->getOrNull('file');
$array108['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments107['arguments'] = $array108;
$arguments107['section'] = NULL;
$arguments107['optional'] = false;
$renderChildrenClosure109 = function() {return NULL;};

$output88 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments107, $renderChildrenClosure109, $renderingContext);

$output88 .= '
                    </a>
                ';
return $output88;
};

$output85 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments86, $renderChildrenClosure87, $renderingContext);

$output85 .= '
                ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments110 = array();
$renderChildrenClosure111 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output112 = '';

$output112 .= '
                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments113 = array();
$arguments113['partial'] = 'Media/Rendering/Image';
// Rendering Array
$array114 = array();
$array114['file'] = $currentVariableContainer->getOrNull('file');
$array114['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments113['arguments'] = $array114;
$arguments113['section'] = NULL;
$arguments113['optional'] = false;
$renderChildrenClosure115 = function() {return NULL;};

$output112 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments113, $renderChildrenClosure115, $renderingContext);

$output112 .= '
                ';
return $output112;
};

$output85 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments110, $renderChildrenClosure111, $renderingContext);

$output85 .= '
            ';
return $output85;
};
$arguments83['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output116 = '';

$output116 .= '
                    <a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper
$arguments117 = array();
$arguments117['image'] = $currentVariableContainer->getOrNull('file');
$arguments117['maxHeight'] = '1200';
$arguments117['maxWidth'] = '1200';
$arguments117['src'] = NULL;
$arguments117['width'] = NULL;
$arguments117['height'] = NULL;
$arguments117['minWidth'] = NULL;
$arguments117['minHeight'] = NULL;
$arguments117['treatIdAsReference'] = false;
$arguments117['crop'] = NULL;
$arguments117['absolute'] = false;
$renderChildrenClosure118 = function() {return NULL;};

$output116 .= TYPO3\CMS\Fluid\ViewHelpers\Uri\ImageViewHelper::renderStatic($arguments117, $renderChildrenClosure118, $renderingContext);

$output116 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments119 = array();
$arguments119['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'title', $renderingContext);
$arguments119['keepQuotes'] = false;
$arguments119['encoding'] = NULL;
$arguments119['doubleEncode'] = true;
$renderChildrenClosure120 = function() {return NULL;};
$value121 = ($arguments119['value'] !== NULL ? $arguments119['value'] : $renderChildrenClosure120());

$output116 .= (!is_string($value121) ? $value121 : htmlspecialchars($value121, ($arguments119['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments119['encoding'] !== NULL ? $arguments119['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments119['doubleEncode']));

$output116 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments122 = array();
$arguments122['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'lightbox.cssClass', $renderingContext);
$arguments122['keepQuotes'] = false;
$arguments122['encoding'] = NULL;
$arguments122['doubleEncode'] = true;
$renderChildrenClosure123 = function() {return NULL;};
$value124 = ($arguments122['value'] !== NULL ? $arguments122['value'] : $renderChildrenClosure123());

$output116 .= (!is_string($value124) ? $value124 : htmlspecialchars($value124, ($arguments122['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments122['encoding'] !== NULL ? $arguments122['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments122['doubleEncode']));

$output116 .= '" data-lightbox-width="';
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper
$arguments125 = array();
$arguments125['property'] = 'width';
$renderChildrenClosure126 = function() {return NULL;};

$output116 .= BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper::renderStatic($arguments125, $renderChildrenClosure126, $renderingContext);

$output116 .= '" data-lightbox-height="';
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper
$arguments127 = array();
$arguments127['property'] = 'height';
$renderChildrenClosure128 = function() {return NULL;};

$output116 .= BK2K\BootstrapPackage\ViewHelpers\LastImageInfoViewHelper::renderStatic($arguments127, $renderChildrenClosure128, $renderingContext);

$output116 .= '" rel="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments129 = array();
$arguments129['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'lightbox.prefix', $renderingContext);
$arguments129['keepQuotes'] = false;
$arguments129['encoding'] = NULL;
$arguments129['doubleEncode'] = true;
$renderChildrenClosure130 = function() {return NULL;};
$value131 = ($arguments129['value'] !== NULL ? $arguments129['value'] : $renderChildrenClosure130());

$output116 .= (!is_string($value131) ? $value131 : htmlspecialchars($value131, ($arguments129['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments129['encoding'] !== NULL ? $arguments129['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments129['doubleEncode']));

$output116 .= '-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments132 = array();
$arguments132['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('data'), 'uid', $renderingContext);
$arguments132['keepQuotes'] = false;
$arguments132['encoding'] = NULL;
$arguments132['doubleEncode'] = true;
$renderChildrenClosure133 = function() {return NULL;};
$value134 = ($arguments132['value'] !== NULL ? $arguments132['value'] : $renderChildrenClosure133());

$output116 .= (!is_string($value134) ? $value134 : htmlspecialchars($value134, ($arguments132['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments132['encoding'] !== NULL ? $arguments132['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments132['doubleEncode']));

$output116 .= '">
                        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments135 = array();
$arguments135['partial'] = 'Media/Rendering/Image';
// Rendering Array
$array136 = array();
$array136['file'] = $currentVariableContainer->getOrNull('file');
$array136['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments135['arguments'] = $array136;
$arguments135['section'] = NULL;
$arguments135['optional'] = false;
$renderChildrenClosure137 = function() {return NULL;};

$output116 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments135, $renderChildrenClosure137, $renderingContext);

$output116 .= '
                    </a>
                ';
return $output116;
};
$arguments83['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output138 = '';

$output138 .= '
                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments139 = array();
$arguments139['partial'] = 'Media/Rendering/Image';
// Rendering Array
$array140 = array();
$array140['file'] = $currentVariableContainer->getOrNull('file');
$array140['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments139['arguments'] = $array140;
$arguments139['section'] = NULL;
$arguments139['optional'] = false;
$renderChildrenClosure141 = function() {return NULL;};

$output138 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments139, $renderChildrenClosure141, $renderingContext);

$output138 .= '
                ';
return $output138;
};

$output82 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments83, $renderChildrenClosure84, $renderingContext);

$output82 .= '
        ';
return $output82;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '
    <figcaption class="caption">
        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments142 = array();
$arguments142['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('file'), 'description', $renderingContext);
$arguments142['keepQuotes'] = false;
$arguments142['encoding'] = NULL;
$arguments142['doubleEncode'] = true;
$renderChildrenClosure143 = function() {return NULL;};
$value144 = ($arguments142['value'] !== NULL ? $arguments142['value'] : $renderChildrenClosure143());

$output0 .= (!is_string($value144) ? $value144 : htmlspecialchars($value144, ($arguments142['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments142['encoding'] !== NULL ? $arguments142['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments142['doubleEncode']));

$output0 .= '
    </figcaption>
</figure>
';


return $output0;
}


}
#1507522019    37423     