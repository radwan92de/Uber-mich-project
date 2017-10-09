<?php
class FluidCache_Extensionmanager_List_action_index_ece5ad62fd03ad0cf776cabc48c882522bbeb6c1 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

public function getVariableContainer() {
	// @todo
	return new \TYPO3\CMS\Fluid\Core\ViewHelper\TemplateVariableContainer();
}
public function getLayoutName(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$self = $this;

return 'main';
}
public function hasLayout() {
return TRUE;
}

/**
 * section headline
 */
public function section_9cd7c186300be56726877e2025e8375d991b084a(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();

$output0 = '';

$output0 .= '
	<h1>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments1 = array();
$arguments1['key'] = 'installedExtensions';
$arguments1['id'] = NULL;
$arguments1['default'] = NULL;
$arguments1['htmlEscape'] = NULL;
$arguments1['arguments'] = NULL;
$arguments1['extensionName'] = NULL;
$renderChildrenClosure2 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '</h1>
';


return $output0;
}
/**
 * section content
 */
public function section_040f06fd774092478d450774f5ba30c5da78acc8(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();

$output3 = '';

$output3 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments4 = array();
$arguments4['partial'] = 'List/UploadForm';
$arguments4['section'] = NULL;
$arguments4['arguments'] = array (
);
$arguments4['optional'] = false;
$renderChildrenClosure5 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments4, $renderChildrenClosure5, $renderingContext);

$output3 .= '

	<form class="form-inline">
		<div class="form-group">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments6 = array();
$arguments6['name'] = 'Tx_Extensionmanager_extensionkey';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments7 = array();
$arguments7['key'] = 'extensionList.search';
$arguments7['id'] = NULL;
$arguments7['default'] = NULL;
$arguments7['htmlEscape'] = NULL;
$arguments7['arguments'] = NULL;
$arguments7['extensionName'] = NULL;
$renderChildrenClosure8 = function() {return NULL;};
$arguments6['placeholder'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments7, $renderChildrenClosure8, $renderingContext);
$arguments6['id'] = 'Tx_Extensionmanager_extensionkey';
$arguments6['value'] = $currentVariableContainer->getOrNull('search');
$arguments6['class'] = 'form-control';
$arguments6['additionalAttributes'] = NULL;
$arguments6['data'] = NULL;
$arguments6['required'] = false;
$arguments6['type'] = 'text';
$arguments6['property'] = NULL;
$arguments6['autofocus'] = NULL;
$arguments6['disabled'] = NULL;
$arguments6['maxlength'] = NULL;
$arguments6['readonly'] = NULL;
$arguments6['size'] = NULL;
$arguments6['pattern'] = NULL;
$arguments6['errorClass'] = 'f3-form-error';
$arguments6['dir'] = NULL;
$arguments6['lang'] = NULL;
$arguments6['style'] = NULL;
$arguments6['title'] = NULL;
$arguments6['accesskey'] = NULL;
$arguments6['tabindex'] = NULL;
$arguments6['onclick'] = NULL;
$renderChildrenClosure9 = function() {return NULL;};
$viewHelper10 = $self->getViewHelper('$viewHelper10', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper10->setArguments($arguments6);
$viewHelper10->setRenderingContext($renderingContext);
$viewHelper10->setRenderChildrenClosure($renderChildrenClosure9);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output3 .= $viewHelper10->initializeArgumentsAndRender();

$output3 .= '
		</div>
	</form>
	<br>
	<div class="table-fit">
		<table id="typo3-extension-list" class="table table-striped table-hover typo3-extension-list">
		<thead>
			<tr>
				<th title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments11 = array();
$arguments11['key'] = 'extensionList.header.title.update';
$arguments11['id'] = NULL;
$arguments11['default'] = NULL;
$arguments11['htmlEscape'] = NULL;
$arguments11['arguments'] = NULL;
$arguments11['extensionName'] = NULL;
$renderChildrenClosure12 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments11, $renderChildrenClosure12, $renderingContext);

$output3 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments13 = array();
$arguments13['key'] = 'extensionList.header.update';
$arguments13['id'] = NULL;
$arguments13['default'] = NULL;
$arguments13['htmlEscape'] = NULL;
$arguments13['arguments'] = NULL;
$arguments13['extensionName'] = NULL;
$renderChildrenClosure14 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments13, $renderChildrenClosure14, $renderingContext);

$output3 .= '</th>
				<th title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments15 = array();
$arguments15['key'] = 'extensionList.header.title.activate';
$arguments15['id'] = NULL;
$arguments15['default'] = NULL;
$arguments15['htmlEscape'] = NULL;
$arguments15['arguments'] = NULL;
$arguments15['extensionName'] = NULL;
$renderChildrenClosure16 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments15, $renderChildrenClosure16, $renderingContext);

$output3 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments17 = array();
$arguments17['key'] = 'extensionList.header.activate';
$arguments17['id'] = NULL;
$arguments17['default'] = NULL;
$arguments17['htmlEscape'] = NULL;
$arguments17['arguments'] = NULL;
$arguments17['extensionName'] = NULL;
$renderChildrenClosure18 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments17, $renderChildrenClosure18, $renderingContext);

$output3 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments19 = array();
$arguments19['key'] = 'extensionList.header.extensionName';
$arguments19['id'] = NULL;
$arguments19['default'] = NULL;
$arguments19['htmlEscape'] = NULL;
$arguments19['arguments'] = NULL;
$arguments19['extensionName'] = NULL;
$renderChildrenClosure20 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments19, $renderChildrenClosure20, $renderingContext);

$output3 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments21 = array();
$arguments21['key'] = 'extensionList.header.extensionKey';
$arguments21['id'] = NULL;
$arguments21['default'] = NULL;
$arguments21['htmlEscape'] = NULL;
$arguments21['arguments'] = NULL;
$arguments21['extensionName'] = NULL;
$renderChildrenClosure22 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments21, $renderChildrenClosure22, $renderingContext);

$output3 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments23 = array();
$arguments23['key'] = 'extensionList.header.extensionVersion';
$arguments23['id'] = NULL;
$arguments23['default'] = NULL;
$arguments23['htmlEscape'] = NULL;
$arguments23['arguments'] = NULL;
$arguments23['extensionName'] = NULL;
$renderChildrenClosure24 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments23, $renderChildrenClosure24, $renderingContext);

$output3 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments25 = array();
$arguments25['key'] = 'extensionList.header.extensionState';
$arguments25['id'] = NULL;
$arguments25['default'] = NULL;
$arguments25['htmlEscape'] = NULL;
$arguments25['arguments'] = NULL;
$arguments25['extensionName'] = NULL;
$renderChildrenClosure26 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments25, $renderChildrenClosure26, $renderingContext);

$output3 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments27 = array();
$arguments27['key'] = 'extensionList.header.extensionActions';
$arguments27['id'] = NULL;
$arguments27['default'] = NULL;
$arguments27['htmlEscape'] = NULL;
$arguments27['arguments'] = NULL;
$arguments27['extensionName'] = NULL;
$renderChildrenClosure28 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments27, $renderChildrenClosure28, $renderingContext);

$output3 .= '</th>
			</tr>
		</thead>
		<tbody>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments29 = array();
$arguments29['each'] = $currentVariableContainer->getOrNull('extensions');
$arguments29['as'] = 'extension';
$arguments29['key'] = 'extensionKey';
$arguments29['reverse'] = false;
$arguments29['iteration'] = NULL;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output31 = '';

$output31 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments32 = array();
// Rendering Boolean node
$arguments32['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject', $renderingContext));
$arguments32['then'] = NULL;
$arguments32['else'] = NULL;
$renderChildrenClosure33 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output34 = '';

$output34 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments35 = array();
$renderChildrenClosure36 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output37 = '';

$output37 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments38 = array();
$arguments38['value'] = $currentVariableContainer->getOrNull('extensionKey');
$arguments38['keepQuotes'] = false;
$arguments38['encoding'] = NULL;
$arguments38['doubleEncode'] = true;
$renderChildrenClosure39 = function() {return NULL;};
$value40 = ($arguments38['value'] !== NULL ? $arguments38['value'] : $renderChildrenClosure39());

$output37 .= (!is_string($value40) ? $value40 : htmlspecialchars($value40, ($arguments38['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments38['encoding'] !== NULL ? $arguments38['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments38['doubleEncode']));

$output37 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments41 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments42 = array();
$arguments42['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject.reviewState', $renderingContext);
$arguments42['keepQuotes'] = false;
$arguments42['encoding'] = NULL;
$arguments42['doubleEncode'] = true;
$renderChildrenClosure43 = function() {return NULL;};
$value44 = ($arguments42['value'] !== NULL ? $arguments42['value'] : $renderChildrenClosure43());
$arguments41['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value44) ? $value44 : htmlspecialchars($value44, ($arguments42['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments42['encoding'] !== NULL ? $arguments42['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments42['doubleEncode'])), -1);
$arguments41['then'] = 'insecure';
$arguments41['else'] = NULL;
$renderChildrenClosure45 = function() {return NULL;};

$output37 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments41, $renderChildrenClosure45, $renderingContext);
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments46 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments47 = array();
$arguments47['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject.reviewState', $renderingContext);
$arguments47['keepQuotes'] = false;
$arguments47['encoding'] = NULL;
$arguments47['doubleEncode'] = true;
$renderChildrenClosure48 = function() {return NULL;};
$value49 = ($arguments47['value'] !== NULL ? $arguments47['value'] : $renderChildrenClosure48());
$arguments46['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value49) ? $value49 : htmlspecialchars($value49, ($arguments47['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments47['encoding'] !== NULL ? $arguments47['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments47['doubleEncode'])), -2);
$arguments46['then'] = 'outdated';
$arguments46['else'] = NULL;
$renderChildrenClosure50 = function() {return NULL;};

$output37 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments46, $renderChildrenClosure50, $renderingContext);

$output37 .= ' ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments51 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments52 = array();
$arguments52['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'installed', $renderingContext);
$arguments52['keepQuotes'] = false;
$arguments52['encoding'] = NULL;
$arguments52['doubleEncode'] = true;
$renderChildrenClosure53 = function() {return NULL;};
$value54 = ($arguments52['value'] !== NULL ? $arguments52['value'] : $renderChildrenClosure53());
$arguments51['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value54) ? $value54 : htmlspecialchars($value54, ($arguments52['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments52['encoding'] !== NULL ? $arguments52['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments52['doubleEncode'])));
$arguments51['then'] = '';
$arguments51['else'] = 'inactive';
$renderChildrenClosure55 = function() {return NULL;};

$output37 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments51, $renderChildrenClosure55, $renderingContext);

$output37 .= '">
					';
return $output37;
};

$output34 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments35, $renderChildrenClosure36, $renderingContext);

$output34 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments56 = array();
$renderChildrenClosure57 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output58 = '';

$output58 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments59 = array();
$arguments59['value'] = $currentVariableContainer->getOrNull('extensionKey');
$arguments59['keepQuotes'] = false;
$arguments59['encoding'] = NULL;
$arguments59['doubleEncode'] = true;
$renderChildrenClosure60 = function() {return NULL;};
$value61 = ($arguments59['value'] !== NULL ? $arguments59['value'] : $renderChildrenClosure60());

$output58 .= (!is_string($value61) ? $value61 : htmlspecialchars($value61, ($arguments59['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments59['encoding'] !== NULL ? $arguments59['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments59['doubleEncode']));

$output58 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments62 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments63 = array();
$arguments63['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'installed', $renderingContext);
$arguments63['keepQuotes'] = false;
$arguments63['encoding'] = NULL;
$arguments63['doubleEncode'] = true;
$renderChildrenClosure64 = function() {return NULL;};
$value65 = ($arguments63['value'] !== NULL ? $arguments63['value'] : $renderChildrenClosure64());
$arguments62['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value65) ? $value65 : htmlspecialchars($value65, ($arguments63['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments63['encoding'] !== NULL ? $arguments63['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments63['doubleEncode'])));
$arguments62['then'] = '';
$arguments62['else'] = 'inactive';
$renderChildrenClosure66 = function() {return NULL;};

$output58 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments62, $renderChildrenClosure66, $renderingContext);

$output58 .= '">
					';
return $output58;
};

$output34 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments56, $renderChildrenClosure57, $renderingContext);

$output34 .= '
				';
return $output34;
};
$arguments32['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output67 = '';

$output67 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments68 = array();
$arguments68['value'] = $currentVariableContainer->getOrNull('extensionKey');
$arguments68['keepQuotes'] = false;
$arguments68['encoding'] = NULL;
$arguments68['doubleEncode'] = true;
$renderChildrenClosure69 = function() {return NULL;};
$value70 = ($arguments68['value'] !== NULL ? $arguments68['value'] : $renderChildrenClosure69());

$output67 .= (!is_string($value70) ? $value70 : htmlspecialchars($value70, ($arguments68['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments68['encoding'] !== NULL ? $arguments68['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments68['doubleEncode']));

$output67 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments71 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments72 = array();
$arguments72['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject.reviewState', $renderingContext);
$arguments72['keepQuotes'] = false;
$arguments72['encoding'] = NULL;
$arguments72['doubleEncode'] = true;
$renderChildrenClosure73 = function() {return NULL;};
$value74 = ($arguments72['value'] !== NULL ? $arguments72['value'] : $renderChildrenClosure73());
$arguments71['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value74) ? $value74 : htmlspecialchars($value74, ($arguments72['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments72['encoding'] !== NULL ? $arguments72['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments72['doubleEncode'])), -1);
$arguments71['then'] = 'insecure';
$arguments71['else'] = NULL;
$renderChildrenClosure75 = function() {return NULL;};

$output67 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments71, $renderChildrenClosure75, $renderingContext);
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments76 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments77 = array();
$arguments77['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject.reviewState', $renderingContext);
$arguments77['keepQuotes'] = false;
$arguments77['encoding'] = NULL;
$arguments77['doubleEncode'] = true;
$renderChildrenClosure78 = function() {return NULL;};
$value79 = ($arguments77['value'] !== NULL ? $arguments77['value'] : $renderChildrenClosure78());
$arguments76['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value79) ? $value79 : htmlspecialchars($value79, ($arguments77['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments77['encoding'] !== NULL ? $arguments77['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments77['doubleEncode'])), -2);
$arguments76['then'] = 'outdated';
$arguments76['else'] = NULL;
$renderChildrenClosure80 = function() {return NULL;};

$output67 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments76, $renderChildrenClosure80, $renderingContext);

$output67 .= ' ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments81 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments82 = array();
$arguments82['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'installed', $renderingContext);
$arguments82['keepQuotes'] = false;
$arguments82['encoding'] = NULL;
$arguments82['doubleEncode'] = true;
$renderChildrenClosure83 = function() {return NULL;};
$value84 = ($arguments82['value'] !== NULL ? $arguments82['value'] : $renderChildrenClosure83());
$arguments81['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value84) ? $value84 : htmlspecialchars($value84, ($arguments82['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments82['encoding'] !== NULL ? $arguments82['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments82['doubleEncode'])));
$arguments81['then'] = '';
$arguments81['else'] = 'inactive';
$renderChildrenClosure85 = function() {return NULL;};

$output67 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments81, $renderChildrenClosure85, $renderingContext);

$output67 .= '">
					';
return $output67;
};
$arguments32['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output86 = '';

$output86 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments87 = array();
$arguments87['value'] = $currentVariableContainer->getOrNull('extensionKey');
$arguments87['keepQuotes'] = false;
$arguments87['encoding'] = NULL;
$arguments87['doubleEncode'] = true;
$renderChildrenClosure88 = function() {return NULL;};
$value89 = ($arguments87['value'] !== NULL ? $arguments87['value'] : $renderChildrenClosure88());

$output86 .= (!is_string($value89) ? $value89 : htmlspecialchars($value89, ($arguments87['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments87['encoding'] !== NULL ? $arguments87['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments87['doubleEncode']));

$output86 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments90 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments91 = array();
$arguments91['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'installed', $renderingContext);
$arguments91['keepQuotes'] = false;
$arguments91['encoding'] = NULL;
$arguments91['doubleEncode'] = true;
$renderChildrenClosure92 = function() {return NULL;};
$value93 = ($arguments91['value'] !== NULL ? $arguments91['value'] : $renderChildrenClosure92());
$arguments90['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value93) ? $value93 : htmlspecialchars($value93, ($arguments91['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments91['encoding'] !== NULL ? $arguments91['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments91['doubleEncode'])));
$arguments90['then'] = '';
$arguments90['else'] = 'inactive';
$renderChildrenClosure94 = function() {return NULL;};

$output86 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments90, $renderChildrenClosure94, $renderingContext);

$output86 .= '">
					';
return $output86;
};

$output31 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments32, $renderChildrenClosure33, $renderingContext);

$output31 .= '
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments95 = array();
// Rendering Boolean node
$arguments95['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'updateAvailable', $renderingContext));
$arguments95['then'] = NULL;
$arguments95['else'] = NULL;
$renderChildrenClosure96 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output97 = '';

$output97 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments98 = array();
// Rendering Boolean node
$arguments98['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'state', $renderingContext), 'excludeFromUpdates');
$arguments98['then'] = NULL;
$arguments98['else'] = NULL;
$renderChildrenClosure99 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output100 = '';

$output100 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments101 = array();
$renderChildrenClosure102 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output103 = '';

$output103 .= '
								<span class="btn btn-default disabled" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments104 = array();
$arguments104['key'] = 'extensionList.updateDisabled';
$arguments104['id'] = NULL;
$arguments104['default'] = NULL;
$arguments104['htmlEscape'] = NULL;
$arguments104['arguments'] = NULL;
$arguments104['extensionName'] = NULL;
$renderChildrenClosure105 = function() {return NULL;};

$output103 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments104, $renderChildrenClosure105, $renderingContext);

$output103 .= '">
									';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments106 = array();
$arguments106['identifier'] = 'actions-system-extension-update';
$arguments106['size'] = 'small';
$arguments106['overlay'] = NULL;
$arguments106['state'] = 'default';
$arguments106['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure107 = function() {return NULL;};

$output103 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments106, $renderChildrenClosure107, $renderingContext);

$output103 .= '
								</span>
							';
return $output103;
};

$output100 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments101, $renderChildrenClosure102, $renderingContext);

$output100 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments108 = array();
$renderChildrenClosure109 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output110 = '';

$output110 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments111 = array();
$arguments111['action'] = 'updateCommentForUpdatableVersions';
$arguments111['class'] = 'btn btn-default';
// Rendering Array
$array112 = array();
$array112['data-action'] = 'update-extension';
$arguments111['additionalAttributes'] = $array112;
$arguments111['format'] = 'json';
$arguments111['controller'] = 'Download';
// Rendering Array
$array113 = array();
$array113['extension'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'key', $renderingContext);
$array113['integerVersionStart'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject.integerVersion', $renderingContext);
$array113['integerVersionStop'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'updateToVersion.integerVersion', $renderingContext);
$arguments111['arguments'] = $array113;
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments114 = array();
$arguments114['key'] = 'extensionList.updateToVersion';
// Rendering Array
$array115 = array();
$array115['0'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'updateToVersion.version', $renderingContext);
$arguments114['arguments'] = $array115;
$arguments114['id'] = NULL;
$arguments114['default'] = NULL;
$arguments114['htmlEscape'] = NULL;
$arguments114['extensionName'] = NULL;
$renderChildrenClosure116 = function() {return NULL;};
$arguments111['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments114, $renderChildrenClosure116, $renderingContext);
$arguments111['data'] = NULL;
$arguments111['extensionName'] = NULL;
$arguments111['pluginName'] = NULL;
$arguments111['pageUid'] = NULL;
$arguments111['pageType'] = 0;
$arguments111['noCache'] = false;
$arguments111['noCacheHash'] = false;
$arguments111['section'] = '';
$arguments111['linkAccessRestrictedPages'] = false;
$arguments111['additionalParams'] = array (
);
$arguments111['absolute'] = false;
$arguments111['addQueryString'] = false;
$arguments111['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments111['addQueryStringMethod'] = NULL;
$arguments111['dir'] = NULL;
$arguments111['id'] = NULL;
$arguments111['lang'] = NULL;
$arguments111['style'] = NULL;
$arguments111['accesskey'] = NULL;
$arguments111['tabindex'] = NULL;
$arguments111['onclick'] = NULL;
$arguments111['name'] = NULL;
$arguments111['rel'] = NULL;
$arguments111['rev'] = NULL;
$arguments111['target'] = NULL;
$renderChildrenClosure117 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output118 = '';

$output118 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments119 = array();
$arguments119['identifier'] = 'actions-system-extension-update';
$arguments119['size'] = 'small';
$arguments119['overlay'] = NULL;
$arguments119['state'] = 'default';
$arguments119['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure120 = function() {return NULL;};

$output118 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments119, $renderChildrenClosure120, $renderingContext);

$output118 .= '
									';
return $output118;
};
$viewHelper121 = $self->getViewHelper('$viewHelper121', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper121->setArguments($arguments111);
$viewHelper121->setRenderingContext($renderingContext);
$viewHelper121->setRenderChildrenClosure($renderChildrenClosure117);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper

$output110 .= $viewHelper121->initializeArgumentsAndRender();

$output110 .= '
							';
return $output110;
};

$output100 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments108, $renderChildrenClosure109, $renderingContext);

$output100 .= '
						';
return $output100;
};
$arguments98['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output122 = '';

$output122 .= '
								<span class="btn btn-default disabled" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments123 = array();
$arguments123['key'] = 'extensionList.updateDisabled';
$arguments123['id'] = NULL;
$arguments123['default'] = NULL;
$arguments123['htmlEscape'] = NULL;
$arguments123['arguments'] = NULL;
$arguments123['extensionName'] = NULL;
$renderChildrenClosure124 = function() {return NULL;};

$output122 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments123, $renderChildrenClosure124, $renderingContext);

$output122 .= '">
									';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments125 = array();
$arguments125['identifier'] = 'actions-system-extension-update';
$arguments125['size'] = 'small';
$arguments125['overlay'] = NULL;
$arguments125['state'] = 'default';
$arguments125['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure126 = function() {return NULL;};

$output122 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments125, $renderChildrenClosure126, $renderingContext);

$output122 .= '
								</span>
							';
return $output122;
};
$arguments98['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output127 = '';

$output127 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments128 = array();
$arguments128['action'] = 'updateCommentForUpdatableVersions';
$arguments128['class'] = 'btn btn-default';
// Rendering Array
$array129 = array();
$array129['data-action'] = 'update-extension';
$arguments128['additionalAttributes'] = $array129;
$arguments128['format'] = 'json';
$arguments128['controller'] = 'Download';
// Rendering Array
$array130 = array();
$array130['extension'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'key', $renderingContext);
$array130['integerVersionStart'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject.integerVersion', $renderingContext);
$array130['integerVersionStop'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'updateToVersion.integerVersion', $renderingContext);
$arguments128['arguments'] = $array130;
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments131 = array();
$arguments131['key'] = 'extensionList.updateToVersion';
// Rendering Array
$array132 = array();
$array132['0'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'updateToVersion.version', $renderingContext);
$arguments131['arguments'] = $array132;
$arguments131['id'] = NULL;
$arguments131['default'] = NULL;
$arguments131['htmlEscape'] = NULL;
$arguments131['extensionName'] = NULL;
$renderChildrenClosure133 = function() {return NULL;};
$arguments128['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments131, $renderChildrenClosure133, $renderingContext);
$arguments128['data'] = NULL;
$arguments128['extensionName'] = NULL;
$arguments128['pluginName'] = NULL;
$arguments128['pageUid'] = NULL;
$arguments128['pageType'] = 0;
$arguments128['noCache'] = false;
$arguments128['noCacheHash'] = false;
$arguments128['section'] = '';
$arguments128['linkAccessRestrictedPages'] = false;
$arguments128['additionalParams'] = array (
);
$arguments128['absolute'] = false;
$arguments128['addQueryString'] = false;
$arguments128['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments128['addQueryStringMethod'] = NULL;
$arguments128['dir'] = NULL;
$arguments128['id'] = NULL;
$arguments128['lang'] = NULL;
$arguments128['style'] = NULL;
$arguments128['accesskey'] = NULL;
$arguments128['tabindex'] = NULL;
$arguments128['onclick'] = NULL;
$arguments128['name'] = NULL;
$arguments128['rel'] = NULL;
$arguments128['rev'] = NULL;
$arguments128['target'] = NULL;
$renderChildrenClosure134 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output135 = '';

$output135 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments136 = array();
$arguments136['identifier'] = 'actions-system-extension-update';
$arguments136['size'] = 'small';
$arguments136['overlay'] = NULL;
$arguments136['state'] = 'default';
$arguments136['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure137 = function() {return NULL;};

$output135 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments136, $renderChildrenClosure137, $renderingContext);

$output135 .= '
									';
return $output135;
};
$viewHelper138 = $self->getViewHelper('$viewHelper138', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper138->setArguments($arguments128);
$viewHelper138->setRenderingContext($renderingContext);
$viewHelper138->setRenderChildrenClosure($renderChildrenClosure134);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper

$output127 .= $viewHelper138->initializeArgumentsAndRender();

$output127 .= '
							';
return $output127;
};

$output97 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments98, $renderChildrenClosure99, $renderingContext);

$output97 .= '
					';
return $output97;
};

$output31 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments95, $renderChildrenClosure96, $renderingContext);

$output31 .= '
				</td>
				<td data-order="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments139 = array();
// Rendering Boolean node
$arguments139['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'installed', $renderingContext));
$arguments139['then'] = 'active';
$arguments139['else'] = 'inactive';
$renderChildrenClosure140 = function() {return NULL;};

$output31 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments139, $renderChildrenClosure140, $renderingContext);

$output31 .= '">
					';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ToggleExtensionInstallationStateViewHelper
$arguments141 = array();
$arguments141['extension'] = $currentVariableContainer->getOrNull('extension');
$arguments141['additionalAttributes'] = NULL;
$arguments141['data'] = NULL;
$arguments141['class'] = NULL;
$arguments141['dir'] = NULL;
$arguments141['id'] = NULL;
$arguments141['lang'] = NULL;
$arguments141['style'] = NULL;
$arguments141['title'] = NULL;
$arguments141['accesskey'] = NULL;
$arguments141['tabindex'] = NULL;
$arguments141['onclick'] = NULL;
$arguments141['name'] = NULL;
$arguments141['rel'] = NULL;
$arguments141['rev'] = NULL;
$arguments141['target'] = NULL;
$renderChildrenClosure142 = function() {return NULL;};
$viewHelper143 = $self->getViewHelper('$viewHelper143', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ToggleExtensionInstallationStateViewHelper');
$viewHelper143->setArguments($arguments141);
$viewHelper143->setRenderingContext($renderingContext);
$viewHelper143->setRenderChildrenClosure($renderChildrenClosure142);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ToggleExtensionInstallationStateViewHelper

$output31 .= $viewHelper143->initializeArgumentsAndRender();

$output31 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments144 = array();
// Rendering Boolean node
$arguments144['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'ext_icon', $renderingContext));
$arguments144['then'] = NULL;
$arguments144['else'] = NULL;
$renderChildrenClosure145 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output146 = '';

$output146 .= '
						<img class="ext-icon" src="../';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments147 = array();
$arguments147['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'siteRelPath', $renderingContext);
$arguments147['keepQuotes'] = false;
$arguments147['encoding'] = NULL;
$arguments147['doubleEncode'] = true;
$renderChildrenClosure148 = function() {return NULL;};
$value149 = ($arguments147['value'] !== NULL ? $arguments147['value'] : $renderChildrenClosure148());

$output146 .= (!is_string($value149) ? $value149 : htmlspecialchars($value149, ($arguments147['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments147['encoding'] !== NULL ? $arguments147['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments147['doubleEncode']));
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments150 = array();
$arguments150['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'ext_icon', $renderingContext);
$arguments150['keepQuotes'] = false;
$arguments150['encoding'] = NULL;
$arguments150['doubleEncode'] = true;
$renderChildrenClosure151 = function() {return NULL;};
$value152 = ($arguments150['value'] !== NULL ? $arguments150['value'] : $renderChildrenClosure151());

$output146 .= (!is_string($value152) ? $value152 : htmlspecialchars($value152, ($arguments150['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments150['encoding'] !== NULL ? $arguments150['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments150['doubleEncode']));

$output146 .= '" alt="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments153 = array();
$arguments153['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'title', $renderingContext);
$arguments153['keepQuotes'] = false;
$arguments153['encoding'] = NULL;
$arguments153['doubleEncode'] = true;
$renderChildrenClosure154 = function() {return NULL;};
$value155 = ($arguments153['value'] !== NULL ? $arguments153['value'] : $renderChildrenClosure154());

$output146 .= (!is_string($value155) ? $value155 : htmlspecialchars($value155, ($arguments153['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments153['encoding'] !== NULL ? $arguments153['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments153['doubleEncode']));

$output146 .= '" />
					';
return $output146;
};

$output31 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments144, $renderChildrenClosure145, $renderingContext);

$output31 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper
$arguments156 = array();
$arguments156['extension'] = $currentVariableContainer->getOrNull('extension');
// Rendering Boolean node
$arguments156['forceConfiguration'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('0');
// Rendering Boolean node
$arguments156['showDescription'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments156['additionalAttributes'] = NULL;
$arguments156['data'] = NULL;
$arguments156['class'] = NULL;
$arguments156['dir'] = NULL;
$arguments156['id'] = NULL;
$arguments156['lang'] = NULL;
$arguments156['style'] = NULL;
$arguments156['title'] = NULL;
$arguments156['accesskey'] = NULL;
$arguments156['tabindex'] = NULL;
$arguments156['onclick'] = NULL;
$arguments156['name'] = NULL;
$arguments156['rel'] = NULL;
$arguments156['rev'] = NULL;
$arguments156['target'] = NULL;
$renderChildrenClosure157 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments158 = array();
$arguments158['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'title', $renderingContext);
$arguments158['keepQuotes'] = false;
$arguments158['encoding'] = NULL;
$arguments158['doubleEncode'] = true;
$renderChildrenClosure159 = function() {return NULL;};
$value160 = ($arguments158['value'] !== NULL ? $arguments158['value'] : $renderChildrenClosure159());
return (!is_string($value160) ? $value160 : htmlspecialchars($value160, ($arguments158['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments158['encoding'] !== NULL ? $arguments158['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments158['doubleEncode']));
};
$viewHelper161 = $self->getViewHelper('$viewHelper161', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper');
$viewHelper161->setArguments($arguments156);
$viewHelper161->setRenderingContext($renderingContext);
$viewHelper161->setRenderChildrenClosure($renderChildrenClosure157);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper

$output31 .= $viewHelper161->initializeArgumentsAndRender();

$output31 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments162 = array();
$arguments162['value'] = $currentVariableContainer->getOrNull('extensionKey');
$arguments162['keepQuotes'] = false;
$arguments162['encoding'] = NULL;
$arguments162['doubleEncode'] = true;
$renderChildrenClosure163 = function() {return NULL;};
$value164 = ($arguments162['value'] !== NULL ? $arguments162['value'] : $renderChildrenClosure163());

$output31 .= (!is_string($value164) ? $value164 : htmlspecialchars($value164, ($arguments162['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments162['encoding'] !== NULL ? $arguments162['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments162['doubleEncode']));

$output31 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments165 = array();
$arguments165['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'version', $renderingContext);
$arguments165['keepQuotes'] = false;
$arguments165['encoding'] = NULL;
$arguments165['doubleEncode'] = true;
$renderChildrenClosure166 = function() {return NULL;};
$value167 = ($arguments165['value'] !== NULL ? $arguments165['value'] : $renderChildrenClosure166());

$output31 .= (!is_string($value167) ? $value167 : htmlspecialchars($value167, ($arguments165['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments165['encoding'] !== NULL ? $arguments165['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments165['doubleEncode']));

$output31 .= '
				</td>
				<td>
					<span class="label label-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments168 = array();
$arguments168['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'state', $renderingContext);
$arguments168['keepQuotes'] = false;
$arguments168['encoding'] = NULL;
$arguments168['doubleEncode'] = true;
$renderChildrenClosure169 = function() {return NULL;};
$value170 = ($arguments168['value'] !== NULL ? $arguments168['value'] : $renderChildrenClosure169());

$output31 .= (!is_string($value170) ? $value170 : htmlspecialchars($value170, ($arguments168['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments168['encoding'] !== NULL ? $arguments168['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments168['doubleEncode']));

$output31 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments171 = array();
$arguments171['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'state', $renderingContext);
$arguments171['keepQuotes'] = false;
$arguments171['encoding'] = NULL;
$arguments171['doubleEncode'] = true;
$renderChildrenClosure172 = function() {return NULL;};
$value173 = ($arguments171['value'] !== NULL ? $arguments171['value'] : $renderChildrenClosure172());

$output31 .= (!is_string($value173) ? $value173 : htmlspecialchars($value173, ($arguments171['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments171['encoding'] !== NULL ? $arguments171['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments171['doubleEncode']));

$output31 .= '</span>
				</td>
				<td>
					<div class="btn-group">
						';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper
$arguments174 = array();
$arguments174['extension'] = $currentVariableContainer->getOrNull('extension');
$arguments174['additionalAttributes'] = NULL;
$arguments174['data'] = NULL;
$renderChildrenClosure175 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output176 = '';

$output176 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper
$arguments177 = array();
$arguments177['class'] = 'btn btn-default';
$arguments177['extension'] = $currentVariableContainer->getOrNull('extension');
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments178 = array();
$arguments178['key'] = 'extensionList.configure';
$arguments178['id'] = NULL;
$arguments178['default'] = NULL;
$arguments178['htmlEscape'] = NULL;
$arguments178['arguments'] = NULL;
$arguments178['extensionName'] = NULL;
$renderChildrenClosure179 = function() {return NULL;};
$arguments177['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments178, $renderChildrenClosure179, $renderingContext);
$arguments177['additionalAttributes'] = NULL;
$arguments177['data'] = NULL;
$arguments177['forceConfiguration'] = true;
$arguments177['showDescription'] = false;
$arguments177['dir'] = NULL;
$arguments177['id'] = NULL;
$arguments177['lang'] = NULL;
$arguments177['style'] = NULL;
$arguments177['accesskey'] = NULL;
$arguments177['tabindex'] = NULL;
$arguments177['onclick'] = NULL;
$arguments177['name'] = NULL;
$arguments177['rel'] = NULL;
$arguments177['rev'] = NULL;
$arguments177['target'] = NULL;
$renderChildrenClosure180 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output181 = '';

$output181 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments182 = array();
$arguments182['identifier'] = 'actions-system-extension-configure';
$arguments182['size'] = 'small';
$arguments182['overlay'] = NULL;
$arguments182['state'] = 'default';
$arguments182['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure183 = function() {return NULL;};

$output181 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments182, $renderChildrenClosure183, $renderingContext);

$output181 .= '
							';
return $output181;
};
$viewHelper184 = $self->getViewHelper('$viewHelper184', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper');
$viewHelper184->setArguments($arguments177);
$viewHelper184->setRenderingContext($renderingContext);
$viewHelper184->setRenderChildrenClosure($renderChildrenClosure180);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper

$output176 .= $viewHelper184->initializeArgumentsAndRender();

$output176 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\UpdateScriptViewHelper
$arguments185 = array();
$arguments185['class'] = 'btn btn-default';
$arguments185['extensionKey'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'key', $renderingContext);
$arguments185['additionalAttributes'] = NULL;
$arguments185['data'] = NULL;
$arguments185['dir'] = NULL;
$arguments185['id'] = NULL;
$arguments185['lang'] = NULL;
$arguments185['style'] = NULL;
$arguments185['title'] = NULL;
$arguments185['accesskey'] = NULL;
$arguments185['tabindex'] = NULL;
$arguments185['onclick'] = NULL;
$arguments185['name'] = NULL;
$arguments185['rel'] = NULL;
$arguments185['rev'] = NULL;
$arguments185['target'] = NULL;
$renderChildrenClosure186 = function() {return NULL;};
$viewHelper187 = $self->getViewHelper('$viewHelper187', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\UpdateScriptViewHelper');
$viewHelper187->setArguments($arguments185);
$viewHelper187->setRenderingContext($renderingContext);
$viewHelper187->setRenderChildrenClosure($renderChildrenClosure186);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\UpdateScriptViewHelper

$output176 .= $viewHelper187->initializeArgumentsAndRender();

$output176 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\RemoveExtensionViewHelper
$arguments188 = array();
$arguments188['class'] = 'btn btn-default';
$arguments188['extension'] = $currentVariableContainer->getOrNull('extension');
$arguments188['additionalAttributes'] = NULL;
$arguments188['data'] = NULL;
$arguments188['dir'] = NULL;
$arguments188['id'] = NULL;
$arguments188['lang'] = NULL;
$arguments188['style'] = NULL;
$arguments188['title'] = NULL;
$arguments188['accesskey'] = NULL;
$arguments188['tabindex'] = NULL;
$arguments188['onclick'] = NULL;
$arguments188['name'] = NULL;
$arguments188['rel'] = NULL;
$arguments188['rev'] = NULL;
$arguments188['target'] = NULL;
$renderChildrenClosure189 = function() {return NULL;};
$viewHelper190 = $self->getViewHelper('$viewHelper190', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\RemoveExtensionViewHelper');
$viewHelper190->setArguments($arguments188);
$viewHelper190->setRenderingContext($renderingContext);
$viewHelper190->setRenderChildrenClosure($renderChildrenClosure189);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\RemoveExtensionViewHelper

$output176 .= $viewHelper190->initializeArgumentsAndRender();

$output176 .= '
							<span class="btn btn-default">
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments191 = array();
$arguments191['action'] = 'downloadExtensionZip';
$arguments191['controller'] = 'Action';
// Rendering Array
$array192 = array();
$array192['extension'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'key', $renderingContext);
$arguments191['arguments'] = $array192;
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments193 = array();
$arguments193['key'] = 'extensionList.downloadzip';
$arguments193['id'] = NULL;
$arguments193['default'] = NULL;
$arguments193['htmlEscape'] = NULL;
$arguments193['arguments'] = NULL;
$arguments193['extensionName'] = NULL;
$renderChildrenClosure194 = function() {return NULL;};
$arguments191['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments193, $renderChildrenClosure194, $renderingContext);
$arguments191['additionalAttributes'] = NULL;
$arguments191['data'] = NULL;
$arguments191['extensionName'] = NULL;
$arguments191['pluginName'] = NULL;
$arguments191['pageUid'] = NULL;
$arguments191['pageType'] = 0;
$arguments191['noCache'] = false;
$arguments191['noCacheHash'] = false;
$arguments191['section'] = '';
$arguments191['format'] = '';
$arguments191['linkAccessRestrictedPages'] = false;
$arguments191['additionalParams'] = array (
);
$arguments191['absolute'] = false;
$arguments191['addQueryString'] = false;
$arguments191['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments191['addQueryStringMethod'] = NULL;
$arguments191['class'] = NULL;
$arguments191['dir'] = NULL;
$arguments191['id'] = NULL;
$arguments191['lang'] = NULL;
$arguments191['style'] = NULL;
$arguments191['accesskey'] = NULL;
$arguments191['tabindex'] = NULL;
$arguments191['onclick'] = NULL;
$arguments191['name'] = NULL;
$arguments191['rel'] = NULL;
$arguments191['rev'] = NULL;
$arguments191['target'] = NULL;
$renderChildrenClosure195 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output196 = '';

$output196 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments197 = array();
$arguments197['identifier'] = 'actions-system-extension-download';
$arguments197['size'] = 'small';
$arguments197['overlay'] = NULL;
$arguments197['state'] = 'default';
$arguments197['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure198 = function() {return NULL;};

$output196 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments197, $renderChildrenClosure198, $renderingContext);

$output196 .= '
								';
return $output196;
};
$viewHelper199 = $self->getViewHelper('$viewHelper199', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper199->setArguments($arguments191);
$viewHelper199->setRenderingContext($renderingContext);
$viewHelper199->setRenderChildrenClosure($renderChildrenClosure195);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper

$output176 .= $viewHelper199->initializeArgumentsAndRender();

$output176 .= '
							</span>
							';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\DownloadExtensionDataViewHelper
$arguments200 = array();
$arguments200['class'] = 'btn btn-default';
$arguments200['extension'] = $currentVariableContainer->getOrNull('extension');
$arguments200['additionalAttributes'] = NULL;
$arguments200['data'] = NULL;
$arguments200['dir'] = NULL;
$arguments200['id'] = NULL;
$arguments200['lang'] = NULL;
$arguments200['style'] = NULL;
$arguments200['title'] = NULL;
$arguments200['accesskey'] = NULL;
$arguments200['tabindex'] = NULL;
$arguments200['onclick'] = NULL;
$arguments200['name'] = NULL;
$arguments200['rel'] = NULL;
$arguments200['rev'] = NULL;
$arguments200['target'] = NULL;
$renderChildrenClosure201 = function() {return NULL;};
$viewHelper202 = $self->getViewHelper('$viewHelper202', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\DownloadExtensionDataViewHelper');
$viewHelper202->setArguments($arguments200);
$viewHelper202->setRenderingContext($renderingContext);
$viewHelper202->setRenderChildrenClosure($renderChildrenClosure201);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\DownloadExtensionDataViewHelper

$output176 .= $viewHelper202->initializeArgumentsAndRender();

$output176 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ReloadSqlDataViewHelper
$arguments203 = array();
$arguments203['class'] = 'btn btn-default';
$arguments203['extension'] = $currentVariableContainer->getOrNull('extension');
$arguments203['additionalAttributes'] = NULL;
$arguments203['data'] = NULL;
$arguments203['dir'] = NULL;
$arguments203['id'] = NULL;
$arguments203['lang'] = NULL;
$arguments203['style'] = NULL;
$arguments203['title'] = NULL;
$arguments203['accesskey'] = NULL;
$arguments203['tabindex'] = NULL;
$arguments203['onclick'] = NULL;
$arguments203['name'] = NULL;
$arguments203['rel'] = NULL;
$arguments203['rev'] = NULL;
$arguments203['target'] = NULL;
$renderChildrenClosure204 = function() {return NULL;};
$viewHelper205 = $self->getViewHelper('$viewHelper205', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ReloadSqlDataViewHelper');
$viewHelper205->setArguments($arguments203);
$viewHelper205->setRenderingContext($renderingContext);
$viewHelper205->setRenderChildrenClosure($renderChildrenClosure204);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ReloadSqlDataViewHelper

$output176 .= $viewHelper205->initializeArgumentsAndRender();

$output176 .= '
						';
return $output176;
};
$viewHelper206 = $self->getViewHelper('$viewHelper206', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper');
$viewHelper206->setArguments($arguments174);
$viewHelper206->setRenderingContext($renderingContext);
$viewHelper206->setRenderChildrenClosure($renderChildrenClosure175);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper

$output31 .= $viewHelper206->initializeArgumentsAndRender();

$output31 .= '
					</div>
				</td>
				</tr>
			';
return $output31;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments29, $renderChildrenClosure30, $renderingContext);

$output3 .= '
		</tbody>
	</table>
	</div>
';


return $output3;
}
/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();

$output207 = '';

$output207 .= '


';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper
$arguments208 = array();
$arguments208['name'] = 'main';
$renderChildrenClosure209 = function() {return NULL;};
$viewHelper210 = $self->getViewHelper('$viewHelper210', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper210->setArguments($arguments208);
$viewHelper210->setRenderingContext($renderingContext);
$viewHelper210->setRenderChildrenClosure($renderChildrenClosure209);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper

$output207 .= $viewHelper210->initializeArgumentsAndRender();

$output207 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments211 = array();
$arguments211['name'] = 'headline';
$renderChildrenClosure212 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output213 = '';

$output213 .= '
	<h1>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments214 = array();
$arguments214['key'] = 'installedExtensions';
$arguments214['id'] = NULL;
$arguments214['default'] = NULL;
$arguments214['htmlEscape'] = NULL;
$arguments214['arguments'] = NULL;
$arguments214['extensionName'] = NULL;
$renderChildrenClosure215 = function() {return NULL;};

$output213 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments214, $renderChildrenClosure215, $renderingContext);

$output213 .= '</h1>
';
return $output213;
};

$output207 .= '';

$output207 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments216 = array();
$arguments216['name'] = 'content';
$renderChildrenClosure217 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output218 = '';

$output218 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments219 = array();
$arguments219['partial'] = 'List/UploadForm';
$arguments219['section'] = NULL;
$arguments219['arguments'] = array (
);
$arguments219['optional'] = false;
$renderChildrenClosure220 = function() {return NULL;};

$output218 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments219, $renderChildrenClosure220, $renderingContext);

$output218 .= '

	<form class="form-inline">
		<div class="form-group">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments221 = array();
$arguments221['name'] = 'Tx_Extensionmanager_extensionkey';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments222 = array();
$arguments222['key'] = 'extensionList.search';
$arguments222['id'] = NULL;
$arguments222['default'] = NULL;
$arguments222['htmlEscape'] = NULL;
$arguments222['arguments'] = NULL;
$arguments222['extensionName'] = NULL;
$renderChildrenClosure223 = function() {return NULL;};
$arguments221['placeholder'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments222, $renderChildrenClosure223, $renderingContext);
$arguments221['id'] = 'Tx_Extensionmanager_extensionkey';
$arguments221['value'] = $currentVariableContainer->getOrNull('search');
$arguments221['class'] = 'form-control';
$arguments221['additionalAttributes'] = NULL;
$arguments221['data'] = NULL;
$arguments221['required'] = false;
$arguments221['type'] = 'text';
$arguments221['property'] = NULL;
$arguments221['autofocus'] = NULL;
$arguments221['disabled'] = NULL;
$arguments221['maxlength'] = NULL;
$arguments221['readonly'] = NULL;
$arguments221['size'] = NULL;
$arguments221['pattern'] = NULL;
$arguments221['errorClass'] = 'f3-form-error';
$arguments221['dir'] = NULL;
$arguments221['lang'] = NULL;
$arguments221['style'] = NULL;
$arguments221['title'] = NULL;
$arguments221['accesskey'] = NULL;
$arguments221['tabindex'] = NULL;
$arguments221['onclick'] = NULL;
$renderChildrenClosure224 = function() {return NULL;};
$viewHelper225 = $self->getViewHelper('$viewHelper225', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper225->setArguments($arguments221);
$viewHelper225->setRenderingContext($renderingContext);
$viewHelper225->setRenderChildrenClosure($renderChildrenClosure224);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output218 .= $viewHelper225->initializeArgumentsAndRender();

$output218 .= '
		</div>
	</form>
	<br>
	<div class="table-fit">
		<table id="typo3-extension-list" class="table table-striped table-hover typo3-extension-list">
		<thead>
			<tr>
				<th title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments226 = array();
$arguments226['key'] = 'extensionList.header.title.update';
$arguments226['id'] = NULL;
$arguments226['default'] = NULL;
$arguments226['htmlEscape'] = NULL;
$arguments226['arguments'] = NULL;
$arguments226['extensionName'] = NULL;
$renderChildrenClosure227 = function() {return NULL;};

$output218 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments226, $renderChildrenClosure227, $renderingContext);

$output218 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments228 = array();
$arguments228['key'] = 'extensionList.header.update';
$arguments228['id'] = NULL;
$arguments228['default'] = NULL;
$arguments228['htmlEscape'] = NULL;
$arguments228['arguments'] = NULL;
$arguments228['extensionName'] = NULL;
$renderChildrenClosure229 = function() {return NULL;};

$output218 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments228, $renderChildrenClosure229, $renderingContext);

$output218 .= '</th>
				<th title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments230 = array();
$arguments230['key'] = 'extensionList.header.title.activate';
$arguments230['id'] = NULL;
$arguments230['default'] = NULL;
$arguments230['htmlEscape'] = NULL;
$arguments230['arguments'] = NULL;
$arguments230['extensionName'] = NULL;
$renderChildrenClosure231 = function() {return NULL;};

$output218 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments230, $renderChildrenClosure231, $renderingContext);

$output218 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments232 = array();
$arguments232['key'] = 'extensionList.header.activate';
$arguments232['id'] = NULL;
$arguments232['default'] = NULL;
$arguments232['htmlEscape'] = NULL;
$arguments232['arguments'] = NULL;
$arguments232['extensionName'] = NULL;
$renderChildrenClosure233 = function() {return NULL;};

$output218 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments232, $renderChildrenClosure233, $renderingContext);

$output218 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments234 = array();
$arguments234['key'] = 'extensionList.header.extensionName';
$arguments234['id'] = NULL;
$arguments234['default'] = NULL;
$arguments234['htmlEscape'] = NULL;
$arguments234['arguments'] = NULL;
$arguments234['extensionName'] = NULL;
$renderChildrenClosure235 = function() {return NULL;};

$output218 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments234, $renderChildrenClosure235, $renderingContext);

$output218 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments236 = array();
$arguments236['key'] = 'extensionList.header.extensionKey';
$arguments236['id'] = NULL;
$arguments236['default'] = NULL;
$arguments236['htmlEscape'] = NULL;
$arguments236['arguments'] = NULL;
$arguments236['extensionName'] = NULL;
$renderChildrenClosure237 = function() {return NULL;};

$output218 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments236, $renderChildrenClosure237, $renderingContext);

$output218 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments238 = array();
$arguments238['key'] = 'extensionList.header.extensionVersion';
$arguments238['id'] = NULL;
$arguments238['default'] = NULL;
$arguments238['htmlEscape'] = NULL;
$arguments238['arguments'] = NULL;
$arguments238['extensionName'] = NULL;
$renderChildrenClosure239 = function() {return NULL;};

$output218 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments238, $renderChildrenClosure239, $renderingContext);

$output218 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments240 = array();
$arguments240['key'] = 'extensionList.header.extensionState';
$arguments240['id'] = NULL;
$arguments240['default'] = NULL;
$arguments240['htmlEscape'] = NULL;
$arguments240['arguments'] = NULL;
$arguments240['extensionName'] = NULL;
$renderChildrenClosure241 = function() {return NULL;};

$output218 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments240, $renderChildrenClosure241, $renderingContext);

$output218 .= '</th>
				<th>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments242 = array();
$arguments242['key'] = 'extensionList.header.extensionActions';
$arguments242['id'] = NULL;
$arguments242['default'] = NULL;
$arguments242['htmlEscape'] = NULL;
$arguments242['arguments'] = NULL;
$arguments242['extensionName'] = NULL;
$renderChildrenClosure243 = function() {return NULL;};

$output218 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments242, $renderChildrenClosure243, $renderingContext);

$output218 .= '</th>
			</tr>
		</thead>
		<tbody>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments244 = array();
$arguments244['each'] = $currentVariableContainer->getOrNull('extensions');
$arguments244['as'] = 'extension';
$arguments244['key'] = 'extensionKey';
$arguments244['reverse'] = false;
$arguments244['iteration'] = NULL;
$renderChildrenClosure245 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output246 = '';

$output246 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments247 = array();
// Rendering Boolean node
$arguments247['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject', $renderingContext));
$arguments247['then'] = NULL;
$arguments247['else'] = NULL;
$renderChildrenClosure248 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output249 = '';

$output249 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments250 = array();
$renderChildrenClosure251 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output252 = '';

$output252 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments253 = array();
$arguments253['value'] = $currentVariableContainer->getOrNull('extensionKey');
$arguments253['keepQuotes'] = false;
$arguments253['encoding'] = NULL;
$arguments253['doubleEncode'] = true;
$renderChildrenClosure254 = function() {return NULL;};
$value255 = ($arguments253['value'] !== NULL ? $arguments253['value'] : $renderChildrenClosure254());

$output252 .= (!is_string($value255) ? $value255 : htmlspecialchars($value255, ($arguments253['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments253['encoding'] !== NULL ? $arguments253['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments253['doubleEncode']));

$output252 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments256 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments257 = array();
$arguments257['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject.reviewState', $renderingContext);
$arguments257['keepQuotes'] = false;
$arguments257['encoding'] = NULL;
$arguments257['doubleEncode'] = true;
$renderChildrenClosure258 = function() {return NULL;};
$value259 = ($arguments257['value'] !== NULL ? $arguments257['value'] : $renderChildrenClosure258());
$arguments256['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value259) ? $value259 : htmlspecialchars($value259, ($arguments257['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments257['encoding'] !== NULL ? $arguments257['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments257['doubleEncode'])), -1);
$arguments256['then'] = 'insecure';
$arguments256['else'] = NULL;
$renderChildrenClosure260 = function() {return NULL;};

$output252 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments256, $renderChildrenClosure260, $renderingContext);
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments261 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments262 = array();
$arguments262['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject.reviewState', $renderingContext);
$arguments262['keepQuotes'] = false;
$arguments262['encoding'] = NULL;
$arguments262['doubleEncode'] = true;
$renderChildrenClosure263 = function() {return NULL;};
$value264 = ($arguments262['value'] !== NULL ? $arguments262['value'] : $renderChildrenClosure263());
$arguments261['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value264) ? $value264 : htmlspecialchars($value264, ($arguments262['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments262['encoding'] !== NULL ? $arguments262['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments262['doubleEncode'])), -2);
$arguments261['then'] = 'outdated';
$arguments261['else'] = NULL;
$renderChildrenClosure265 = function() {return NULL;};

$output252 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments261, $renderChildrenClosure265, $renderingContext);

$output252 .= ' ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments266 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments267 = array();
$arguments267['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'installed', $renderingContext);
$arguments267['keepQuotes'] = false;
$arguments267['encoding'] = NULL;
$arguments267['doubleEncode'] = true;
$renderChildrenClosure268 = function() {return NULL;};
$value269 = ($arguments267['value'] !== NULL ? $arguments267['value'] : $renderChildrenClosure268());
$arguments266['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value269) ? $value269 : htmlspecialchars($value269, ($arguments267['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments267['encoding'] !== NULL ? $arguments267['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments267['doubleEncode'])));
$arguments266['then'] = '';
$arguments266['else'] = 'inactive';
$renderChildrenClosure270 = function() {return NULL;};

$output252 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments266, $renderChildrenClosure270, $renderingContext);

$output252 .= '">
					';
return $output252;
};

$output249 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments250, $renderChildrenClosure251, $renderingContext);

$output249 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments271 = array();
$renderChildrenClosure272 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output273 = '';

$output273 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments274 = array();
$arguments274['value'] = $currentVariableContainer->getOrNull('extensionKey');
$arguments274['keepQuotes'] = false;
$arguments274['encoding'] = NULL;
$arguments274['doubleEncode'] = true;
$renderChildrenClosure275 = function() {return NULL;};
$value276 = ($arguments274['value'] !== NULL ? $arguments274['value'] : $renderChildrenClosure275());

$output273 .= (!is_string($value276) ? $value276 : htmlspecialchars($value276, ($arguments274['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments274['encoding'] !== NULL ? $arguments274['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments274['doubleEncode']));

$output273 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments277 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments278 = array();
$arguments278['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'installed', $renderingContext);
$arguments278['keepQuotes'] = false;
$arguments278['encoding'] = NULL;
$arguments278['doubleEncode'] = true;
$renderChildrenClosure279 = function() {return NULL;};
$value280 = ($arguments278['value'] !== NULL ? $arguments278['value'] : $renderChildrenClosure279());
$arguments277['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value280) ? $value280 : htmlspecialchars($value280, ($arguments278['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments278['encoding'] !== NULL ? $arguments278['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments278['doubleEncode'])));
$arguments277['then'] = '';
$arguments277['else'] = 'inactive';
$renderChildrenClosure281 = function() {return NULL;};

$output273 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments277, $renderChildrenClosure281, $renderingContext);

$output273 .= '">
					';
return $output273;
};

$output249 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments271, $renderChildrenClosure272, $renderingContext);

$output249 .= '
				';
return $output249;
};
$arguments247['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output282 = '';

$output282 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments283 = array();
$arguments283['value'] = $currentVariableContainer->getOrNull('extensionKey');
$arguments283['keepQuotes'] = false;
$arguments283['encoding'] = NULL;
$arguments283['doubleEncode'] = true;
$renderChildrenClosure284 = function() {return NULL;};
$value285 = ($arguments283['value'] !== NULL ? $arguments283['value'] : $renderChildrenClosure284());

$output282 .= (!is_string($value285) ? $value285 : htmlspecialchars($value285, ($arguments283['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments283['encoding'] !== NULL ? $arguments283['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments283['doubleEncode']));

$output282 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments286 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments287 = array();
$arguments287['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject.reviewState', $renderingContext);
$arguments287['keepQuotes'] = false;
$arguments287['encoding'] = NULL;
$arguments287['doubleEncode'] = true;
$renderChildrenClosure288 = function() {return NULL;};
$value289 = ($arguments287['value'] !== NULL ? $arguments287['value'] : $renderChildrenClosure288());
$arguments286['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value289) ? $value289 : htmlspecialchars($value289, ($arguments287['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments287['encoding'] !== NULL ? $arguments287['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments287['doubleEncode'])), -1);
$arguments286['then'] = 'insecure';
$arguments286['else'] = NULL;
$renderChildrenClosure290 = function() {return NULL;};

$output282 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments286, $renderChildrenClosure290, $renderingContext);
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments291 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments292 = array();
$arguments292['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject.reviewState', $renderingContext);
$arguments292['keepQuotes'] = false;
$arguments292['encoding'] = NULL;
$arguments292['doubleEncode'] = true;
$renderChildrenClosure293 = function() {return NULL;};
$value294 = ($arguments292['value'] !== NULL ? $arguments292['value'] : $renderChildrenClosure293());
$arguments291['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', (!is_string($value294) ? $value294 : htmlspecialchars($value294, ($arguments292['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments292['encoding'] !== NULL ? $arguments292['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments292['doubleEncode'])), -2);
$arguments291['then'] = 'outdated';
$arguments291['else'] = NULL;
$renderChildrenClosure295 = function() {return NULL;};

$output282 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments291, $renderChildrenClosure295, $renderingContext);

$output282 .= ' ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments296 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments297 = array();
$arguments297['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'installed', $renderingContext);
$arguments297['keepQuotes'] = false;
$arguments297['encoding'] = NULL;
$arguments297['doubleEncode'] = true;
$renderChildrenClosure298 = function() {return NULL;};
$value299 = ($arguments297['value'] !== NULL ? $arguments297['value'] : $renderChildrenClosure298());
$arguments296['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value299) ? $value299 : htmlspecialchars($value299, ($arguments297['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments297['encoding'] !== NULL ? $arguments297['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments297['doubleEncode'])));
$arguments296['then'] = '';
$arguments296['else'] = 'inactive';
$renderChildrenClosure300 = function() {return NULL;};

$output282 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments296, $renderChildrenClosure300, $renderingContext);

$output282 .= '">
					';
return $output282;
};
$arguments247['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output301 = '';

$output301 .= '
						<tr id="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments302 = array();
$arguments302['value'] = $currentVariableContainer->getOrNull('extensionKey');
$arguments302['keepQuotes'] = false;
$arguments302['encoding'] = NULL;
$arguments302['doubleEncode'] = true;
$renderChildrenClosure303 = function() {return NULL;};
$value304 = ($arguments302['value'] !== NULL ? $arguments302['value'] : $renderChildrenClosure303());

$output301 .= (!is_string($value304) ? $value304 : htmlspecialchars($value304, ($arguments302['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments302['encoding'] !== NULL ? $arguments302['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments302['doubleEncode']));

$output301 .= '" class="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments305 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments306 = array();
$arguments306['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'installed', $renderingContext);
$arguments306['keepQuotes'] = false;
$arguments306['encoding'] = NULL;
$arguments306['doubleEncode'] = true;
$renderChildrenClosure307 = function() {return NULL;};
$value308 = ($arguments306['value'] !== NULL ? $arguments306['value'] : $renderChildrenClosure307());
$arguments305['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean((!is_string($value308) ? $value308 : htmlspecialchars($value308, ($arguments306['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments306['encoding'] !== NULL ? $arguments306['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments306['doubleEncode'])));
$arguments305['then'] = '';
$arguments305['else'] = 'inactive';
$renderChildrenClosure309 = function() {return NULL;};

$output301 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments305, $renderChildrenClosure309, $renderingContext);

$output301 .= '">
					';
return $output301;
};

$output246 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments247, $renderChildrenClosure248, $renderingContext);

$output246 .= '
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments310 = array();
// Rendering Boolean node
$arguments310['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'updateAvailable', $renderingContext));
$arguments310['then'] = NULL;
$arguments310['else'] = NULL;
$renderChildrenClosure311 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output312 = '';

$output312 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments313 = array();
// Rendering Boolean node
$arguments313['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'state', $renderingContext), 'excludeFromUpdates');
$arguments313['then'] = NULL;
$arguments313['else'] = NULL;
$renderChildrenClosure314 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output315 = '';

$output315 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments316 = array();
$renderChildrenClosure317 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output318 = '';

$output318 .= '
								<span class="btn btn-default disabled" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments319 = array();
$arguments319['key'] = 'extensionList.updateDisabled';
$arguments319['id'] = NULL;
$arguments319['default'] = NULL;
$arguments319['htmlEscape'] = NULL;
$arguments319['arguments'] = NULL;
$arguments319['extensionName'] = NULL;
$renderChildrenClosure320 = function() {return NULL;};

$output318 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments319, $renderChildrenClosure320, $renderingContext);

$output318 .= '">
									';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments321 = array();
$arguments321['identifier'] = 'actions-system-extension-update';
$arguments321['size'] = 'small';
$arguments321['overlay'] = NULL;
$arguments321['state'] = 'default';
$arguments321['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure322 = function() {return NULL;};

$output318 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments321, $renderChildrenClosure322, $renderingContext);

$output318 .= '
								</span>
							';
return $output318;
};

$output315 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments316, $renderChildrenClosure317, $renderingContext);

$output315 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments323 = array();
$renderChildrenClosure324 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output325 = '';

$output325 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments326 = array();
$arguments326['action'] = 'updateCommentForUpdatableVersions';
$arguments326['class'] = 'btn btn-default';
// Rendering Array
$array327 = array();
$array327['data-action'] = 'update-extension';
$arguments326['additionalAttributes'] = $array327;
$arguments326['format'] = 'json';
$arguments326['controller'] = 'Download';
// Rendering Array
$array328 = array();
$array328['extension'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'key', $renderingContext);
$array328['integerVersionStart'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject.integerVersion', $renderingContext);
$array328['integerVersionStop'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'updateToVersion.integerVersion', $renderingContext);
$arguments326['arguments'] = $array328;
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments329 = array();
$arguments329['key'] = 'extensionList.updateToVersion';
// Rendering Array
$array330 = array();
$array330['0'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'updateToVersion.version', $renderingContext);
$arguments329['arguments'] = $array330;
$arguments329['id'] = NULL;
$arguments329['default'] = NULL;
$arguments329['htmlEscape'] = NULL;
$arguments329['extensionName'] = NULL;
$renderChildrenClosure331 = function() {return NULL;};
$arguments326['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments329, $renderChildrenClosure331, $renderingContext);
$arguments326['data'] = NULL;
$arguments326['extensionName'] = NULL;
$arguments326['pluginName'] = NULL;
$arguments326['pageUid'] = NULL;
$arguments326['pageType'] = 0;
$arguments326['noCache'] = false;
$arguments326['noCacheHash'] = false;
$arguments326['section'] = '';
$arguments326['linkAccessRestrictedPages'] = false;
$arguments326['additionalParams'] = array (
);
$arguments326['absolute'] = false;
$arguments326['addQueryString'] = false;
$arguments326['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments326['addQueryStringMethod'] = NULL;
$arguments326['dir'] = NULL;
$arguments326['id'] = NULL;
$arguments326['lang'] = NULL;
$arguments326['style'] = NULL;
$arguments326['accesskey'] = NULL;
$arguments326['tabindex'] = NULL;
$arguments326['onclick'] = NULL;
$arguments326['name'] = NULL;
$arguments326['rel'] = NULL;
$arguments326['rev'] = NULL;
$arguments326['target'] = NULL;
$renderChildrenClosure332 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output333 = '';

$output333 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments334 = array();
$arguments334['identifier'] = 'actions-system-extension-update';
$arguments334['size'] = 'small';
$arguments334['overlay'] = NULL;
$arguments334['state'] = 'default';
$arguments334['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure335 = function() {return NULL;};

$output333 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments334, $renderChildrenClosure335, $renderingContext);

$output333 .= '
									';
return $output333;
};
$viewHelper336 = $self->getViewHelper('$viewHelper336', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper336->setArguments($arguments326);
$viewHelper336->setRenderingContext($renderingContext);
$viewHelper336->setRenderChildrenClosure($renderChildrenClosure332);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper

$output325 .= $viewHelper336->initializeArgumentsAndRender();

$output325 .= '
							';
return $output325;
};

$output315 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments323, $renderChildrenClosure324, $renderingContext);

$output315 .= '
						';
return $output315;
};
$arguments313['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output337 = '';

$output337 .= '
								<span class="btn btn-default disabled" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments338 = array();
$arguments338['key'] = 'extensionList.updateDisabled';
$arguments338['id'] = NULL;
$arguments338['default'] = NULL;
$arguments338['htmlEscape'] = NULL;
$arguments338['arguments'] = NULL;
$arguments338['extensionName'] = NULL;
$renderChildrenClosure339 = function() {return NULL;};

$output337 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments338, $renderChildrenClosure339, $renderingContext);

$output337 .= '">
									';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments340 = array();
$arguments340['identifier'] = 'actions-system-extension-update';
$arguments340['size'] = 'small';
$arguments340['overlay'] = NULL;
$arguments340['state'] = 'default';
$arguments340['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure341 = function() {return NULL;};

$output337 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments340, $renderChildrenClosure341, $renderingContext);

$output337 .= '
								</span>
							';
return $output337;
};
$arguments313['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output342 = '';

$output342 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments343 = array();
$arguments343['action'] = 'updateCommentForUpdatableVersions';
$arguments343['class'] = 'btn btn-default';
// Rendering Array
$array344 = array();
$array344['data-action'] = 'update-extension';
$arguments343['additionalAttributes'] = $array344;
$arguments343['format'] = 'json';
$arguments343['controller'] = 'Download';
// Rendering Array
$array345 = array();
$array345['extension'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'key', $renderingContext);
$array345['integerVersionStart'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'terObject.integerVersion', $renderingContext);
$array345['integerVersionStop'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'updateToVersion.integerVersion', $renderingContext);
$arguments343['arguments'] = $array345;
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments346 = array();
$arguments346['key'] = 'extensionList.updateToVersion';
// Rendering Array
$array347 = array();
$array347['0'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'updateToVersion.version', $renderingContext);
$arguments346['arguments'] = $array347;
$arguments346['id'] = NULL;
$arguments346['default'] = NULL;
$arguments346['htmlEscape'] = NULL;
$arguments346['extensionName'] = NULL;
$renderChildrenClosure348 = function() {return NULL;};
$arguments343['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments346, $renderChildrenClosure348, $renderingContext);
$arguments343['data'] = NULL;
$arguments343['extensionName'] = NULL;
$arguments343['pluginName'] = NULL;
$arguments343['pageUid'] = NULL;
$arguments343['pageType'] = 0;
$arguments343['noCache'] = false;
$arguments343['noCacheHash'] = false;
$arguments343['section'] = '';
$arguments343['linkAccessRestrictedPages'] = false;
$arguments343['additionalParams'] = array (
);
$arguments343['absolute'] = false;
$arguments343['addQueryString'] = false;
$arguments343['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments343['addQueryStringMethod'] = NULL;
$arguments343['dir'] = NULL;
$arguments343['id'] = NULL;
$arguments343['lang'] = NULL;
$arguments343['style'] = NULL;
$arguments343['accesskey'] = NULL;
$arguments343['tabindex'] = NULL;
$arguments343['onclick'] = NULL;
$arguments343['name'] = NULL;
$arguments343['rel'] = NULL;
$arguments343['rev'] = NULL;
$arguments343['target'] = NULL;
$renderChildrenClosure349 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output350 = '';

$output350 .= '
										';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments351 = array();
$arguments351['identifier'] = 'actions-system-extension-update';
$arguments351['size'] = 'small';
$arguments351['overlay'] = NULL;
$arguments351['state'] = 'default';
$arguments351['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure352 = function() {return NULL;};

$output350 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments351, $renderChildrenClosure352, $renderingContext);

$output350 .= '
									';
return $output350;
};
$viewHelper353 = $self->getViewHelper('$viewHelper353', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper353->setArguments($arguments343);
$viewHelper353->setRenderingContext($renderingContext);
$viewHelper353->setRenderChildrenClosure($renderChildrenClosure349);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper

$output342 .= $viewHelper353->initializeArgumentsAndRender();

$output342 .= '
							';
return $output342;
};

$output312 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments313, $renderChildrenClosure314, $renderingContext);

$output312 .= '
					';
return $output312;
};

$output246 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments310, $renderChildrenClosure311, $renderingContext);

$output246 .= '
				</td>
				<td data-order="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments354 = array();
// Rendering Boolean node
$arguments354['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'installed', $renderingContext));
$arguments354['then'] = 'active';
$arguments354['else'] = 'inactive';
$renderChildrenClosure355 = function() {return NULL;};

$output246 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments354, $renderChildrenClosure355, $renderingContext);

$output246 .= '">
					';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ToggleExtensionInstallationStateViewHelper
$arguments356 = array();
$arguments356['extension'] = $currentVariableContainer->getOrNull('extension');
$arguments356['additionalAttributes'] = NULL;
$arguments356['data'] = NULL;
$arguments356['class'] = NULL;
$arguments356['dir'] = NULL;
$arguments356['id'] = NULL;
$arguments356['lang'] = NULL;
$arguments356['style'] = NULL;
$arguments356['title'] = NULL;
$arguments356['accesskey'] = NULL;
$arguments356['tabindex'] = NULL;
$arguments356['onclick'] = NULL;
$arguments356['name'] = NULL;
$arguments356['rel'] = NULL;
$arguments356['rev'] = NULL;
$arguments356['target'] = NULL;
$renderChildrenClosure357 = function() {return NULL;};
$viewHelper358 = $self->getViewHelper('$viewHelper358', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ToggleExtensionInstallationStateViewHelper');
$viewHelper358->setArguments($arguments356);
$viewHelper358->setRenderingContext($renderingContext);
$viewHelper358->setRenderChildrenClosure($renderChildrenClosure357);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ToggleExtensionInstallationStateViewHelper

$output246 .= $viewHelper358->initializeArgumentsAndRender();

$output246 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments359 = array();
// Rendering Boolean node
$arguments359['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'ext_icon', $renderingContext));
$arguments359['then'] = NULL;
$arguments359['else'] = NULL;
$renderChildrenClosure360 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output361 = '';

$output361 .= '
						<img class="ext-icon" src="../';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments362 = array();
$arguments362['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'siteRelPath', $renderingContext);
$arguments362['keepQuotes'] = false;
$arguments362['encoding'] = NULL;
$arguments362['doubleEncode'] = true;
$renderChildrenClosure363 = function() {return NULL;};
$value364 = ($arguments362['value'] !== NULL ? $arguments362['value'] : $renderChildrenClosure363());

$output361 .= (!is_string($value364) ? $value364 : htmlspecialchars($value364, ($arguments362['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments362['encoding'] !== NULL ? $arguments362['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments362['doubleEncode']));
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments365 = array();
$arguments365['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'ext_icon', $renderingContext);
$arguments365['keepQuotes'] = false;
$arguments365['encoding'] = NULL;
$arguments365['doubleEncode'] = true;
$renderChildrenClosure366 = function() {return NULL;};
$value367 = ($arguments365['value'] !== NULL ? $arguments365['value'] : $renderChildrenClosure366());

$output361 .= (!is_string($value367) ? $value367 : htmlspecialchars($value367, ($arguments365['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments365['encoding'] !== NULL ? $arguments365['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments365['doubleEncode']));

$output361 .= '" alt="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments368 = array();
$arguments368['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'title', $renderingContext);
$arguments368['keepQuotes'] = false;
$arguments368['encoding'] = NULL;
$arguments368['doubleEncode'] = true;
$renderChildrenClosure369 = function() {return NULL;};
$value370 = ($arguments368['value'] !== NULL ? $arguments368['value'] : $renderChildrenClosure369());

$output361 .= (!is_string($value370) ? $value370 : htmlspecialchars($value370, ($arguments368['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments368['encoding'] !== NULL ? $arguments368['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments368['doubleEncode']));

$output361 .= '" />
					';
return $output361;
};

$output246 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments359, $renderChildrenClosure360, $renderingContext);

$output246 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper
$arguments371 = array();
$arguments371['extension'] = $currentVariableContainer->getOrNull('extension');
// Rendering Boolean node
$arguments371['forceConfiguration'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('0');
// Rendering Boolean node
$arguments371['showDescription'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments371['additionalAttributes'] = NULL;
$arguments371['data'] = NULL;
$arguments371['class'] = NULL;
$arguments371['dir'] = NULL;
$arguments371['id'] = NULL;
$arguments371['lang'] = NULL;
$arguments371['style'] = NULL;
$arguments371['title'] = NULL;
$arguments371['accesskey'] = NULL;
$arguments371['tabindex'] = NULL;
$arguments371['onclick'] = NULL;
$arguments371['name'] = NULL;
$arguments371['rel'] = NULL;
$arguments371['rev'] = NULL;
$arguments371['target'] = NULL;
$renderChildrenClosure372 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments373 = array();
$arguments373['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'title', $renderingContext);
$arguments373['keepQuotes'] = false;
$arguments373['encoding'] = NULL;
$arguments373['doubleEncode'] = true;
$renderChildrenClosure374 = function() {return NULL;};
$value375 = ($arguments373['value'] !== NULL ? $arguments373['value'] : $renderChildrenClosure374());
return (!is_string($value375) ? $value375 : htmlspecialchars($value375, ($arguments373['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments373['encoding'] !== NULL ? $arguments373['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments373['doubleEncode']));
};
$viewHelper376 = $self->getViewHelper('$viewHelper376', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper');
$viewHelper376->setArguments($arguments371);
$viewHelper376->setRenderingContext($renderingContext);
$viewHelper376->setRenderChildrenClosure($renderChildrenClosure372);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper

$output246 .= $viewHelper376->initializeArgumentsAndRender();

$output246 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments377 = array();
$arguments377['value'] = $currentVariableContainer->getOrNull('extensionKey');
$arguments377['keepQuotes'] = false;
$arguments377['encoding'] = NULL;
$arguments377['doubleEncode'] = true;
$renderChildrenClosure378 = function() {return NULL;};
$value379 = ($arguments377['value'] !== NULL ? $arguments377['value'] : $renderChildrenClosure378());

$output246 .= (!is_string($value379) ? $value379 : htmlspecialchars($value379, ($arguments377['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments377['encoding'] !== NULL ? $arguments377['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments377['doubleEncode']));

$output246 .= '
				</td>
				<td>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments380 = array();
$arguments380['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'version', $renderingContext);
$arguments380['keepQuotes'] = false;
$arguments380['encoding'] = NULL;
$arguments380['doubleEncode'] = true;
$renderChildrenClosure381 = function() {return NULL;};
$value382 = ($arguments380['value'] !== NULL ? $arguments380['value'] : $renderChildrenClosure381());

$output246 .= (!is_string($value382) ? $value382 : htmlspecialchars($value382, ($arguments380['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments380['encoding'] !== NULL ? $arguments380['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments380['doubleEncode']));

$output246 .= '
				</td>
				<td>
					<span class="label label-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments383 = array();
$arguments383['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'state', $renderingContext);
$arguments383['keepQuotes'] = false;
$arguments383['encoding'] = NULL;
$arguments383['doubleEncode'] = true;
$renderChildrenClosure384 = function() {return NULL;};
$value385 = ($arguments383['value'] !== NULL ? $arguments383['value'] : $renderChildrenClosure384());

$output246 .= (!is_string($value385) ? $value385 : htmlspecialchars($value385, ($arguments383['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments383['encoding'] !== NULL ? $arguments383['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments383['doubleEncode']));

$output246 .= '">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments386 = array();
$arguments386['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'state', $renderingContext);
$arguments386['keepQuotes'] = false;
$arguments386['encoding'] = NULL;
$arguments386['doubleEncode'] = true;
$renderChildrenClosure387 = function() {return NULL;};
$value388 = ($arguments386['value'] !== NULL ? $arguments386['value'] : $renderChildrenClosure387());

$output246 .= (!is_string($value388) ? $value388 : htmlspecialchars($value388, ($arguments386['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments386['encoding'] !== NULL ? $arguments386['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments386['doubleEncode']));

$output246 .= '</span>
				</td>
				<td>
					<div class="btn-group">
						';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper
$arguments389 = array();
$arguments389['extension'] = $currentVariableContainer->getOrNull('extension');
$arguments389['additionalAttributes'] = NULL;
$arguments389['data'] = NULL;
$renderChildrenClosure390 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output391 = '';

$output391 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper
$arguments392 = array();
$arguments392['class'] = 'btn btn-default';
$arguments392['extension'] = $currentVariableContainer->getOrNull('extension');
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments393 = array();
$arguments393['key'] = 'extensionList.configure';
$arguments393['id'] = NULL;
$arguments393['default'] = NULL;
$arguments393['htmlEscape'] = NULL;
$arguments393['arguments'] = NULL;
$arguments393['extensionName'] = NULL;
$renderChildrenClosure394 = function() {return NULL;};
$arguments392['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments393, $renderChildrenClosure394, $renderingContext);
$arguments392['additionalAttributes'] = NULL;
$arguments392['data'] = NULL;
$arguments392['forceConfiguration'] = true;
$arguments392['showDescription'] = false;
$arguments392['dir'] = NULL;
$arguments392['id'] = NULL;
$arguments392['lang'] = NULL;
$arguments392['style'] = NULL;
$arguments392['accesskey'] = NULL;
$arguments392['tabindex'] = NULL;
$arguments392['onclick'] = NULL;
$arguments392['name'] = NULL;
$arguments392['rel'] = NULL;
$arguments392['rev'] = NULL;
$arguments392['target'] = NULL;
$renderChildrenClosure395 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output396 = '';

$output396 .= '
								';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments397 = array();
$arguments397['identifier'] = 'actions-system-extension-configure';
$arguments397['size'] = 'small';
$arguments397['overlay'] = NULL;
$arguments397['state'] = 'default';
$arguments397['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure398 = function() {return NULL;};

$output396 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments397, $renderChildrenClosure398, $renderingContext);

$output396 .= '
							';
return $output396;
};
$viewHelper399 = $self->getViewHelper('$viewHelper399', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper');
$viewHelper399->setArguments($arguments392);
$viewHelper399->setRenderingContext($renderingContext);
$viewHelper399->setRenderChildrenClosure($renderChildrenClosure395);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ConfigureExtensionViewHelper

$output391 .= $viewHelper399->initializeArgumentsAndRender();

$output391 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\UpdateScriptViewHelper
$arguments400 = array();
$arguments400['class'] = 'btn btn-default';
$arguments400['extensionKey'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'key', $renderingContext);
$arguments400['additionalAttributes'] = NULL;
$arguments400['data'] = NULL;
$arguments400['dir'] = NULL;
$arguments400['id'] = NULL;
$arguments400['lang'] = NULL;
$arguments400['style'] = NULL;
$arguments400['title'] = NULL;
$arguments400['accesskey'] = NULL;
$arguments400['tabindex'] = NULL;
$arguments400['onclick'] = NULL;
$arguments400['name'] = NULL;
$arguments400['rel'] = NULL;
$arguments400['rev'] = NULL;
$arguments400['target'] = NULL;
$renderChildrenClosure401 = function() {return NULL;};
$viewHelper402 = $self->getViewHelper('$viewHelper402', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\UpdateScriptViewHelper');
$viewHelper402->setArguments($arguments400);
$viewHelper402->setRenderingContext($renderingContext);
$viewHelper402->setRenderChildrenClosure($renderChildrenClosure401);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\UpdateScriptViewHelper

$output391 .= $viewHelper402->initializeArgumentsAndRender();

$output391 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\RemoveExtensionViewHelper
$arguments403 = array();
$arguments403['class'] = 'btn btn-default';
$arguments403['extension'] = $currentVariableContainer->getOrNull('extension');
$arguments403['additionalAttributes'] = NULL;
$arguments403['data'] = NULL;
$arguments403['dir'] = NULL;
$arguments403['id'] = NULL;
$arguments403['lang'] = NULL;
$arguments403['style'] = NULL;
$arguments403['title'] = NULL;
$arguments403['accesskey'] = NULL;
$arguments403['tabindex'] = NULL;
$arguments403['onclick'] = NULL;
$arguments403['name'] = NULL;
$arguments403['rel'] = NULL;
$arguments403['rev'] = NULL;
$arguments403['target'] = NULL;
$renderChildrenClosure404 = function() {return NULL;};
$viewHelper405 = $self->getViewHelper('$viewHelper405', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\RemoveExtensionViewHelper');
$viewHelper405->setArguments($arguments403);
$viewHelper405->setRenderingContext($renderingContext);
$viewHelper405->setRenderChildrenClosure($renderChildrenClosure404);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\RemoveExtensionViewHelper

$output391 .= $viewHelper405->initializeArgumentsAndRender();

$output391 .= '
							<span class="btn btn-default">
								';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper
$arguments406 = array();
$arguments406['action'] = 'downloadExtensionZip';
$arguments406['controller'] = 'Action';
// Rendering Array
$array407 = array();
$array407['extension'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('extension'), 'key', $renderingContext);
$arguments406['arguments'] = $array407;
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments408 = array();
$arguments408['key'] = 'extensionList.downloadzip';
$arguments408['id'] = NULL;
$arguments408['default'] = NULL;
$arguments408['htmlEscape'] = NULL;
$arguments408['arguments'] = NULL;
$arguments408['extensionName'] = NULL;
$renderChildrenClosure409 = function() {return NULL;};
$arguments406['title'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments408, $renderChildrenClosure409, $renderingContext);
$arguments406['additionalAttributes'] = NULL;
$arguments406['data'] = NULL;
$arguments406['extensionName'] = NULL;
$arguments406['pluginName'] = NULL;
$arguments406['pageUid'] = NULL;
$arguments406['pageType'] = 0;
$arguments406['noCache'] = false;
$arguments406['noCacheHash'] = false;
$arguments406['section'] = '';
$arguments406['format'] = '';
$arguments406['linkAccessRestrictedPages'] = false;
$arguments406['additionalParams'] = array (
);
$arguments406['absolute'] = false;
$arguments406['addQueryString'] = false;
$arguments406['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments406['addQueryStringMethod'] = NULL;
$arguments406['class'] = NULL;
$arguments406['dir'] = NULL;
$arguments406['id'] = NULL;
$arguments406['lang'] = NULL;
$arguments406['style'] = NULL;
$arguments406['accesskey'] = NULL;
$arguments406['tabindex'] = NULL;
$arguments406['onclick'] = NULL;
$arguments406['name'] = NULL;
$arguments406['rel'] = NULL;
$arguments406['rev'] = NULL;
$arguments406['target'] = NULL;
$renderChildrenClosure410 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output411 = '';

$output411 .= '
									';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments412 = array();
$arguments412['identifier'] = 'actions-system-extension-download';
$arguments412['size'] = 'small';
$arguments412['overlay'] = NULL;
$arguments412['state'] = 'default';
$arguments412['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure413 = function() {return NULL;};

$output411 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments412, $renderChildrenClosure413, $renderingContext);

$output411 .= '
								';
return $output411;
};
$viewHelper414 = $self->getViewHelper('$viewHelper414', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper');
$viewHelper414->setArguments($arguments406);
$viewHelper414->setRenderingContext($renderingContext);
$viewHelper414->setRenderChildrenClosure($renderChildrenClosure410);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Link\ActionViewHelper

$output391 .= $viewHelper414->initializeArgumentsAndRender();

$output391 .= '
							</span>
							';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\DownloadExtensionDataViewHelper
$arguments415 = array();
$arguments415['class'] = 'btn btn-default';
$arguments415['extension'] = $currentVariableContainer->getOrNull('extension');
$arguments415['additionalAttributes'] = NULL;
$arguments415['data'] = NULL;
$arguments415['dir'] = NULL;
$arguments415['id'] = NULL;
$arguments415['lang'] = NULL;
$arguments415['style'] = NULL;
$arguments415['title'] = NULL;
$arguments415['accesskey'] = NULL;
$arguments415['tabindex'] = NULL;
$arguments415['onclick'] = NULL;
$arguments415['name'] = NULL;
$arguments415['rel'] = NULL;
$arguments415['rev'] = NULL;
$arguments415['target'] = NULL;
$renderChildrenClosure416 = function() {return NULL;};
$viewHelper417 = $self->getViewHelper('$viewHelper417', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\DownloadExtensionDataViewHelper');
$viewHelper417->setArguments($arguments415);
$viewHelper417->setRenderingContext($renderingContext);
$viewHelper417->setRenderChildrenClosure($renderChildrenClosure416);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\DownloadExtensionDataViewHelper

$output391 .= $viewHelper417->initializeArgumentsAndRender();

$output391 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ReloadSqlDataViewHelper
$arguments418 = array();
$arguments418['class'] = 'btn btn-default';
$arguments418['extension'] = $currentVariableContainer->getOrNull('extension');
$arguments418['additionalAttributes'] = NULL;
$arguments418['data'] = NULL;
$arguments418['dir'] = NULL;
$arguments418['id'] = NULL;
$arguments418['lang'] = NULL;
$arguments418['style'] = NULL;
$arguments418['title'] = NULL;
$arguments418['accesskey'] = NULL;
$arguments418['tabindex'] = NULL;
$arguments418['onclick'] = NULL;
$arguments418['name'] = NULL;
$arguments418['rel'] = NULL;
$arguments418['rev'] = NULL;
$arguments418['target'] = NULL;
$renderChildrenClosure419 = function() {return NULL;};
$viewHelper420 = $self->getViewHelper('$viewHelper420', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ReloadSqlDataViewHelper');
$viewHelper420->setArguments($arguments418);
$viewHelper420->setRenderingContext($renderingContext);
$viewHelper420->setRenderChildrenClosure($renderChildrenClosure419);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ReloadSqlDataViewHelper

$output391 .= $viewHelper420->initializeArgumentsAndRender();

$output391 .= '
						';
return $output391;
};
$viewHelper421 = $self->getViewHelper('$viewHelper421', $renderingContext, 'TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper');
$viewHelper421->setArguments($arguments389);
$viewHelper421->setRenderingContext($renderingContext);
$viewHelper421->setRenderChildrenClosure($renderChildrenClosure390);
// End of ViewHelper TYPO3\CMS\Extensionmanager\ViewHelpers\ProcessAvailableActionsViewHelper

$output246 .= $viewHelper421->initializeArgumentsAndRender();

$output246 .= '
					</div>
				</td>
				</tr>
			';
return $output246;
};

$output218 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments244, $renderChildrenClosure245, $renderingContext);

$output218 .= '
		</tbody>
	</table>
	</div>
';
return $output218;
};

$output207 .= '';

$output207 .= '
';


return $output207;
}


}
#1507400714    126349    