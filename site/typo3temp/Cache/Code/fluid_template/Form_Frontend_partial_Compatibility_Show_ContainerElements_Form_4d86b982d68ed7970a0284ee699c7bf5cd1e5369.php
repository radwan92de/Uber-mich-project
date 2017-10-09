<?php
class FluidCache_Form_Frontend_partial_Compatibility_Show_ContainerElements_Form_4d86b982d68ed7970a0284ee699c7bf5cd1e5369 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper
$arguments1 = array();
$arguments1['class'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.class', $renderingContext);
$arguments1['dir'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.dir', $renderingContext);
$arguments1['id'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.id', $renderingContext);
$arguments1['lang'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.lang', $renderingContext);
$arguments1['style'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.style', $renderingContext);
$arguments1['title'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.title', $renderingContext);
$arguments1['accesskey'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.accesskey', $renderingContext);
$arguments1['tabindex'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.tabindex', $renderingContext);
$arguments1['onclick'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.onclick', $renderingContext);
$arguments1['enctype'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.enctype', $renderingContext);
$arguments1['method'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.method', $renderingContext);
$arguments1['name'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.name', $renderingContext);
$arguments1['onreset'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.onreset', $renderingContext);
$arguments1['onsubmit'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.onsubmit', $renderingContext);
// Rendering Boolean node
$arguments1['absolute'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.absolute', $renderingContext));
$arguments1['action'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.action', $renderingContext);
$arguments1['actionUri'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.actionUri', $renderingContext);
// Rendering Boolean node
$arguments1['addQueryString'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.addQueryString', $renderingContext));
$arguments1['additionalAttributes'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'htmlAttributes', $renderingContext);
$arguments1['additionalParams'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.additionalParams', $renderingContext);
$arguments1['arguments'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.arguments', $renderingContext);
$arguments1['argumentsToBeExcludedFromQueryString'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.argumentsToBeExcludedFromQueryString', $renderingContext);
$arguments1['controller'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.controller', $renderingContext);
$arguments1['extensionName'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.extensionName', $renderingContext);
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments2 = array();
// Rendering Boolean node
$arguments2['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.format', $renderingContext));
$arguments2['then'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.format', $renderingContext);
$arguments2['else'] = NULL;
$renderChildrenClosure3 = function() {return NULL;};
$arguments1['format'] = TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments2, $renderChildrenClosure3, $renderingContext);
$arguments1['hiddenFieldClassName'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.hiddenFieldClassName', $renderingContext);
$arguments1['object'] = $currentVariableContainer->getOrNull('model');
$arguments1['pageType'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.pageType', $renderingContext);
$arguments1['pageUid'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.pageUid', $renderingContext);
$arguments1['pluginName'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.pluginName', $renderingContext);
$arguments1['section'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'additionalArguments.section', $renderingContext);
$arguments1['data'] = NULL;
$arguments1['noCache'] = false;
$arguments1['noCacheHash'] = false;
$arguments1['fieldNamePrefix'] = NULL;
$arguments1['objectName'] = NULL;
$arguments1['addQueryStringMethod'] = '';
$arguments1['target'] = NULL;
$renderChildrenClosure4 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output5 = '';

$output5 .= '

	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments6 = array();
$arguments6['value'] = NULL;
$renderChildrenClosure7 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
return \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'layout.containerInnerWrap.0', $renderingContext);
};

$output5 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments6, $renderChildrenClosure7, $renderingContext);

$output5 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments8 = array();
$arguments8['each'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'childElements', $renderingContext);
$arguments8['as'] = 'element';
$arguments8['key'] = '';
$arguments8['reverse'] = false;
$arguments8['iteration'] = NULL;
$renderChildrenClosure9 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output10 = '';

$output10 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments11 = array();
$output12 = '';

$output12 .= $currentVariableContainer->getOrNull('themeName');

$output12 .= '/Show/';

$output12 .= \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('element'), 'partialPath', $renderingContext);
$arguments11['partial'] = $output12;
// Rendering Array
$array13 = array();
$array13['model'] = $currentVariableContainer->getOrNull('element');
$array13['themeName'] = $currentVariableContainer->getOrNull('themeName');
$arguments11['arguments'] = $array13;
$arguments11['section'] = NULL;
$arguments11['optional'] = false;
$renderChildrenClosure14 = function() {return NULL;};

$output10 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments11, $renderChildrenClosure14, $renderingContext);

$output10 .= '
		';
return $output10;
};

$output5 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments8, $renderChildrenClosure9, $renderingContext);

$output5 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper
$arguments15 = array();
$arguments15['value'] = NULL;
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
return \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'layout.containerInnerWrap.1', $renderingContext);
};

$output5 .= TYPO3\CMS\Fluid\ViewHelpers\Format\RawViewHelper::renderStatic($arguments15, $renderChildrenClosure16, $renderingContext);

$output5 .= '
';
return $output5;
};
$viewHelper17 = $self->getViewHelper('$viewHelper17', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper');
$viewHelper17->setArguments($arguments1);
$viewHelper17->setRenderingContext($renderingContext);
$viewHelper17->setRenderChildrenClosure($renderChildrenClosure4);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper

$output0 .= $viewHelper17->initializeArgumentsAndRender();

$output0 .= '
';


return $output0;
}


}
#1507522019    11640     