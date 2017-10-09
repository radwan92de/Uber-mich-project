<?php
class FluidCache_Form_Frontend_action_show_7d787e60bd0165a948b00386dc76828823291533 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// @todo
	return new \TYPO3\CMS\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$self = $this;

return 'Default';
}
public function hasLayout() {
return TRUE;
}

/**
 * section main
 */
public function section_b28b7af69320201d1cf206ebf28373980add1451(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();

$output0 = '';

$output0 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments1 = array();
$output2 = '';

$output2 .= \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'themeName', $renderingContext);

$output2 .= '/Show/ContainerElements/Form';
$arguments1['partial'] = $output2;
// Rendering Array
$array3 = array();
$array3['model'] = $currentVariableContainer->getOrNull('model');
$array3['themeName'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'themeName', $renderingContext);
$arguments1['arguments'] = $array3;
$arguments1['section'] = NULL;
$arguments1['optional'] = false;
$renderChildrenClosure4 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments1, $renderChildrenClosure4, $renderingContext);

$output0 .= '
';


return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();

$output5 = '';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper
$arguments6 = array();
$arguments6['name'] = 'Default';
$renderChildrenClosure7 = function() {return NULL;};
$viewHelper8 = $self->getViewHelper('$viewHelper8', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper8->setArguments($arguments6);
$viewHelper8->setRenderingContext($renderingContext);
$viewHelper8->setRenderChildrenClosure($renderChildrenClosure7);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper

$output5 .= $viewHelper8->initializeArgumentsAndRender();

$output5 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments9 = array();
$arguments9['name'] = 'main';
$renderChildrenClosure10 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output11 = '';

$output11 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments12 = array();
$output13 = '';

$output13 .= \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'themeName', $renderingContext);

$output13 .= '/Show/ContainerElements/Form';
$arguments12['partial'] = $output13;
// Rendering Array
$array14 = array();
$array14['model'] = $currentVariableContainer->getOrNull('model');
$array14['themeName'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('model'), 'themeName', $renderingContext);
$arguments12['arguments'] = $array14;
$arguments12['section'] = NULL;
$arguments12['optional'] = false;
$renderChildrenClosure15 = function() {return NULL;};

$output11 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments12, $renderChildrenClosure15, $renderingContext);

$output11 .= '
';
return $output11;
};

$output5 .= '';

$output5 .= '
';


return $output5;
}


}
#1507522019    4007      