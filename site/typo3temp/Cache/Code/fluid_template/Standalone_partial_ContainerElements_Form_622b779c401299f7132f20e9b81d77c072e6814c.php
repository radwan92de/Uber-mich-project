<?php
class FluidCache_Standalone_partial_ContainerElements_Form_622b779c401299f7132f20e9b81d77c072e6814c extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
// Rendering ViewHelper TYPO3\CMS\Form\ViewHelpers\PlainMailViewHelper
$arguments1 = array();
$arguments1['content'] = $currentVariableContainer->getOrNull('model');
$arguments1['labelContent'] = NULL;
$arguments1['newLineAfterLabel'] = false;
$arguments1['indent'] = 0;
$renderChildrenClosure2 = function() {return NULL;};
$viewHelper3 = $self->getViewHelper('$viewHelper3', $renderingContext, 'TYPO3\CMS\Form\ViewHelpers\PlainMailViewHelper');
$viewHelper3->setArguments($arguments1);
$viewHelper3->setRenderingContext($renderingContext);
$viewHelper3->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\CMS\Form\ViewHelpers\PlainMailViewHelper

$output0 .= $viewHelper3->initializeArgumentsAndRender();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments4 = array();
$arguments4['each'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'childElements', $renderingContext);
$arguments4['as'] = 'element';
$arguments4['key'] = '';
$arguments4['reverse'] = false;
$arguments4['iteration'] = NULL;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments6 = array();
$arguments6['partial'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('element'), 'partialPath', $renderingContext);
// Rendering Array
$array7 = array();
$array7['model'] = $currentVariableContainer->getOrNull('element');
$arguments6['arguments'] = $array7;
$arguments6['section'] = NULL;
$arguments6['optional'] = false;
$renderChildrenClosure8 = function() {return NULL;};
return TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments6, $renderChildrenClosure8, $renderingContext);
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments4, $renderChildrenClosure5, $renderingContext);


return $output0;
}


}
#1507516106    2918      