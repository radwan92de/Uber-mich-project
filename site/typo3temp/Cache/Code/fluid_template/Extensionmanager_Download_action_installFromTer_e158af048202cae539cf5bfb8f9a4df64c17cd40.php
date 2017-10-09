<?php
class FluidCache_Extensionmanager_Download_action_installFromTer_e158af048202cae539cf5bfb8f9a4df64c17cd40 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\Format\JsonEncodeViewHelper
$arguments1 = array();
// Rendering Array
$array2 = array();
$array2['result'] = $currentVariableContainer->getOrNull('result');
$array2['extension'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'extensionKey', $renderingContext);
$array2['installationTypeLanguageKey'] = $currentVariableContainer->getOrNull('installationTypeLanguageKey');
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CountViewHelper
$arguments3 = array();
$arguments3['subject'] = $currentVariableContainer->getOrNull('unresolvedDependencies');
$renderChildrenClosure4 = function() {return NULL;};
$array2['errorCount'] = TYPO3\CMS\Fluid\ViewHelpers\CountViewHelper::renderStatic($arguments3, $renderChildrenClosure4, $renderingContext);
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments5 = array();
$arguments5['key'] = 'downloadExtension.dependencies.errorTitle';
$arguments5['id'] = NULL;
$arguments5['default'] = NULL;
$arguments5['htmlEscape'] = NULL;
$arguments5['arguments'] = NULL;
$arguments5['extensionName'] = NULL;
$renderChildrenClosure6 = function() {return NULL;};
$array2['errorTitle'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments5, $renderChildrenClosure6, $renderingContext);
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments7 = array();
$arguments7['partial'] = 'List/UnresolvedDependencies';
$arguments7['arguments'] = $currentVariableContainer->getOrNull('_all');
$arguments7['section'] = NULL;
$arguments7['optional'] = false;
$renderChildrenClosure8 = function() {return NULL;};
$array2['errorMessage'] = TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments7, $renderChildrenClosure8, $renderingContext);
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$arguments9 = array();
$arguments9['action'] = 'installExtensionWithoutSystemDependencyCheck';
$arguments9['format'] = 'json';
// Rendering Array
$array10 = array();
$array10['extension'] = $currentVariableContainer->getOrNull('extension');
$arguments9['arguments'] = $array10;
$arguments9['controller'] = NULL;
$arguments9['extensionName'] = NULL;
$arguments9['pluginName'] = NULL;
$arguments9['pageUid'] = NULL;
$arguments9['pageType'] = 0;
$arguments9['noCache'] = false;
$arguments9['noCacheHash'] = false;
$arguments9['section'] = '';
$arguments9['linkAccessRestrictedPages'] = false;
$arguments9['additionalParams'] = array (
);
$arguments9['absolute'] = false;
$arguments9['addQueryString'] = false;
$arguments9['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments9['addQueryStringMethod'] = NULL;
$renderChildrenClosure11 = function() {return NULL;};
$viewHelper12 = $self->getViewHelper('$viewHelper12', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper');
$viewHelper12->setArguments($arguments9);
$viewHelper12->setRenderingContext($renderingContext);
$viewHelper12->setRenderChildrenClosure($renderChildrenClosure11);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Uri\ActionViewHelper
$array2['skipDependencyUri'] = $viewHelper12->initializeArgumentsAndRender();
$arguments1['additionalAttributes'] = $array2;
$renderChildrenClosure13 = function() {return NULL;};

$output0 .= TYPO3\CMS\Extensionmanager\ViewHelpers\Format\JsonEncodeViewHelper::renderStatic($arguments1, $renderChildrenClosure13, $renderingContext);


return $output0;
}


}
#1507253523    4384      