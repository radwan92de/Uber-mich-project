<?php
class FluidCache_Standalone_layout_Default_8605076bc488c0d0203f0b1e3fea1187ac5a126b extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SwitchViewHelper
$arguments1 = array();
$arguments1['expression'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('data'), 'section_frame', $renderingContext);
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output3 = '';

$output3 .= '
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments4 = array();
$arguments4['value'] = '1';
$arguments4['default'] = false;
$renderChildrenClosure5 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\VarViewHelper
$arguments6 = array();
$arguments6['name'] = 'sectionClass';
$arguments6['value'] = 'invisible';
$renderChildrenClosure7 = function() {return NULL;};
return BK2K\BootstrapPackage\ViewHelpers\VarViewHelper::renderStatic($arguments6, $renderChildrenClosure7, $renderingContext);
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments4, $renderChildrenClosure5, $renderingContext);

$output3 .= '
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments8 = array();
$arguments8['value'] = '5';
$arguments8['default'] = false;
$renderChildrenClosure9 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\VarViewHelper
$arguments10 = array();
$arguments10['name'] = 'sectionClass';
$arguments10['value'] = 'rulerbefore';
$renderChildrenClosure11 = function() {return NULL;};
return BK2K\BootstrapPackage\ViewHelpers\VarViewHelper::renderStatic($arguments10, $renderChildrenClosure11, $renderingContext);
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments8, $renderChildrenClosure9, $renderingContext);

$output3 .= '
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments12 = array();
$arguments12['value'] = '6';
$arguments12['default'] = false;
$renderChildrenClosure13 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\VarViewHelper
$arguments14 = array();
$arguments14['name'] = 'sectionClass';
$arguments14['value'] = 'rulerafter';
$renderChildrenClosure15 = function() {return NULL;};
return BK2K\BootstrapPackage\ViewHelpers\VarViewHelper::renderStatic($arguments14, $renderChildrenClosure15, $renderingContext);
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments12, $renderChildrenClosure13, $renderingContext);

$output3 .= '
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments16 = array();
$arguments16['value'] = '10';
$arguments16['default'] = false;
$renderChildrenClosure17 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\VarViewHelper
$arguments18 = array();
$arguments18['name'] = 'sectionClass';
$arguments18['value'] = 'col-xs-10 col-xs-push-1';
$renderChildrenClosure19 = function() {return NULL;};
return BK2K\BootstrapPackage\ViewHelpers\VarViewHelper::renderStatic($arguments18, $renderChildrenClosure19, $renderingContext);
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments16, $renderChildrenClosure17, $renderingContext);

$output3 .= '
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments20 = array();
$arguments20['value'] = '11';
$arguments20['default'] = false;
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\VarViewHelper
$arguments22 = array();
$arguments22['name'] = 'sectionClass';
$arguments22['value'] = 'col-xs-9 col-xs-push-3';
$renderChildrenClosure23 = function() {return NULL;};
return BK2K\BootstrapPackage\ViewHelpers\VarViewHelper::renderStatic($arguments22, $renderChildrenClosure23, $renderingContext);
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments20, $renderChildrenClosure21, $renderingContext);

$output3 .= '
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments24 = array();
$arguments24['value'] = '12';
$arguments24['default'] = false;
$renderChildrenClosure25 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\VarViewHelper
$arguments26 = array();
$arguments26['name'] = 'sectionClass';
$arguments26['value'] = 'col-xs-9';
$renderChildrenClosure27 = function() {return NULL;};
return BK2K\BootstrapPackage\ViewHelpers\VarViewHelper::renderStatic($arguments26, $renderChildrenClosure27, $renderingContext);
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments24, $renderChildrenClosure25, $renderingContext);

$output3 .= '
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments28 = array();
$arguments28['value'] = '20';
$arguments28['default'] = false;
$renderChildrenClosure29 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\VarViewHelper
$arguments30 = array();
$arguments30['name'] = 'sectionClass';
$arguments30['value'] = 'well';
$renderChildrenClosure31 = function() {return NULL;};
return BK2K\BootstrapPackage\ViewHelpers\VarViewHelper::renderStatic($arguments30, $renderChildrenClosure31, $renderingContext);
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments28, $renderChildrenClosure29, $renderingContext);

$output3 .= '
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments32 = array();
$arguments32['value'] = '21';
$arguments32['default'] = false;
$renderChildrenClosure33 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\VarViewHelper
$arguments34 = array();
$arguments34['name'] = 'sectionClass';
$arguments34['value'] = 'jumbotron';
$renderChildrenClosure35 = function() {return NULL;};
return BK2K\BootstrapPackage\ViewHelpers\VarViewHelper::renderStatic($arguments34, $renderChildrenClosure35, $renderingContext);
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments32, $renderChildrenClosure33, $renderingContext);

$output3 .= '
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments36 = array();
// Rendering Boolean node
$arguments36['default'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('TRUE');
$arguments36['value'] = NULL;
$renderChildrenClosure37 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
// Rendering ViewHelper BK2K\BootstrapPackage\ViewHelpers\VarViewHelper
$arguments38 = array();
$arguments38['name'] = 'sectionClass';
$arguments38['value'] = 'default';
$renderChildrenClosure39 = function() {return NULL;};
return BK2K\BootstrapPackage\ViewHelpers\VarViewHelper::renderStatic($arguments38, $renderChildrenClosure39, $renderingContext);
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments36, $renderChildrenClosure37, $renderingContext);

$output3 .= '
';
return $output3;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\SwitchViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '

<div id="c';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments40 = array();
$arguments40['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('data'), 'uid', $renderingContext);
$arguments40['keepQuotes'] = false;
$arguments40['encoding'] = NULL;
$arguments40['doubleEncode'] = true;
$renderChildrenClosure41 = function() {return NULL;};
$value42 = ($arguments40['value'] !== NULL ? $arguments40['value'] : $renderChildrenClosure41());

$output0 .= (!is_string($value42) ? $value42 : htmlspecialchars($value42, ($arguments40['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments40['encoding'] !== NULL ? $arguments40['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments40['doubleEncode']));

$output0 .= '" class="frame ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments43 = array();
$arguments43['value'] = $currentVariableContainer->getOrNull('sectionClass');
$arguments43['keepQuotes'] = false;
$arguments43['encoding'] = NULL;
$arguments43['doubleEncode'] = true;
$renderChildrenClosure44 = function() {return NULL;};
$value45 = ($arguments43['value'] !== NULL ? $arguments43['value'] : $renderChildrenClosure44());

$output0 .= (!is_string($value45) ? $value45 : htmlspecialchars($value45, ($arguments43['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments43['encoding'] !== NULL ? $arguments43['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments43['doubleEncode']));

$output0 .= '">
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments46 = array();
// Rendering Boolean node
$arguments46['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('data'), '_LOCALIZED_UID', $renderingContext));
$arguments46['then'] = NULL;
$arguments46['else'] = NULL;
$renderChildrenClosure47 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output48 = '';

$output48 .= '<a id="c';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments49 = array();
$arguments49['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('data'), '_LOCALIZED_UID', $renderingContext);
$arguments49['keepQuotes'] = false;
$arguments49['encoding'] = NULL;
$arguments49['doubleEncode'] = true;
$renderChildrenClosure50 = function() {return NULL;};
$value51 = ($arguments49['value'] !== NULL ? $arguments49['value'] : $renderChildrenClosure50());

$output48 .= (!is_string($value51) ? $value51 : htmlspecialchars($value51, ($arguments49['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments49['encoding'] !== NULL ? $arguments49['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments49['doubleEncode']));

$output48 .= '"></a>';
return $output48;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments46, $renderChildrenClosure47, $renderingContext);

$output0 .= '
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments52 = array();
$arguments52['section'] = 'Header';
$arguments52['partial'] = NULL;
$arguments52['arguments'] = array (
);
$arguments52['optional'] = false;
$renderChildrenClosure53 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments52, $renderChildrenClosure53, $renderingContext);

$output0 .= '
    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments54 = array();
$arguments54['section'] = 'Main';
$arguments54['partial'] = NULL;
$arguments54['arguments'] = array (
);
$arguments54['optional'] = false;
$renderChildrenClosure55 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments54, $renderChildrenClosure55, $renderingContext);

$output0 .= '
</div>
';


return $output0;
}


}
#1507522019    13140     