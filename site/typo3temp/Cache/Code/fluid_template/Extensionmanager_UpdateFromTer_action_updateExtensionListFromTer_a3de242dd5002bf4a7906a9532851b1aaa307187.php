<?php
class FluidCache_Extensionmanager_UpdateFromTer_action_updateExtensionListFromTer_a3de242dd5002bf4a7906a9532851b1aaa307187 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
$array2['updated'] = $currentVariableContainer->getOrNull('updated');
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments3 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments4 = array();
$arguments4['key'] = 'extensionList.updateFromTer.lastUpdate.fullTimeFormat';
$arguments4['id'] = NULL;
$arguments4['default'] = NULL;
$arguments4['htmlEscape'] = NULL;
$arguments4['arguments'] = NULL;
$arguments4['extensionName'] = NULL;
$renderChildrenClosure5 = function() {return NULL;};
$arguments3['format'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments4, $renderChildrenClosure5, $renderingContext);
$arguments3['date'] = NULL;
$arguments3['base'] = NULL;
$renderChildrenClosure6 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
return \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('repository'), 'lastUpdate', $renderingContext);
};
$array2['lastUpdateTime'] = TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments3, $renderChildrenClosure6, $renderingContext);
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\TimeSinceLastUpdateViewHelper
$arguments7 = array();
$arguments7['lastUpdateTime'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('repository'), 'lastUpdate', $renderingContext);
$renderChildrenClosure8 = function() {return NULL;};
$array2['timeSinceLastUpdate'] = TYPO3\CMS\Extensionmanager\ViewHelpers\TimeSinceLastUpdateViewHelper::renderStatic($arguments7, $renderChildrenClosure8, $renderingContext);
$array2['errorMessage'] = $currentVariableContainer->getOrNull('errorMessage');
$arguments1['additionalAttributes'] = $array2;
$renderChildrenClosure9 = function() {return NULL;};

$output0 .= TYPO3\CMS\Extensionmanager\ViewHelpers\Format\JsonEncodeViewHelper::renderStatic($arguments1, $renderChildrenClosure9, $renderingContext);

$output0 .= '
';


return $output0;
}


}
#1507268219    3141      