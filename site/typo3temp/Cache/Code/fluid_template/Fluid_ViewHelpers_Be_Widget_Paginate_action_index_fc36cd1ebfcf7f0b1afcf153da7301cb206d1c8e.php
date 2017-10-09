<?php
class FluidCache_Fluid_ViewHelpers_Be_Widget_Paginate_action_index_fc36cd1ebfcf7f0b1afcf153da7301cb206d1c8e extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
 * section paginator
 */
public function section_31b8d545b1939b065e8931304bab52b99d8b4567(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();

$output0 = '';

$output0 .= '
	<nav class="pagination-wrap">
		<ul class="pagination pagination-block">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'hasLessPages', $renderingContext));
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
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments7 = array();
// Rendering Array
$array8 = array();
$array8['currentPage'] = 1;
$arguments7['arguments'] = $array8;
$arguments7['action'] = NULL;
$arguments7['section'] = '';
$arguments7['format'] = '';
$arguments7['ajax'] = false;
$arguments7['addQueryStringMethod'] = NULL;
$renderChildrenClosure9 = function() {return NULL;};
$viewHelper10 = $self->getViewHelper('$viewHelper10', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper10->setArguments($arguments7);
$viewHelper10->setRenderingContext($renderingContext);
$viewHelper10->setRenderChildrenClosure($renderChildrenClosure9);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output6 .= $viewHelper10->initializeArgumentsAndRender();

$output6 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments11 = array();
$arguments11['key'] = 'widget.pagination.first';
$arguments11['id'] = NULL;
$arguments11['default'] = NULL;
$arguments11['htmlEscape'] = NULL;
$arguments11['arguments'] = NULL;
$arguments11['extensionName'] = NULL;
$renderChildrenClosure12 = function() {return NULL;};

$output6 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments11, $renderChildrenClosure12, $renderingContext);

$output6 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments13 = array();
$arguments13['identifier'] = 'actions-view-paging-first';
$arguments13['size'] = 'small';
$arguments13['overlay'] = NULL;
$arguments13['state'] = 'default';
$arguments13['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure14 = function() {return NULL;};

$output6 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments13, $renderChildrenClosure14, $renderingContext);

$output6 .= '
						</a>
					</li>
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments15 = array();
// Rendering Array
$array16 = array();
$array16['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'previousPage', $renderingContext);
$arguments15['arguments'] = $array16;
$arguments15['action'] = NULL;
$arguments15['section'] = '';
$arguments15['format'] = '';
$arguments15['ajax'] = false;
$arguments15['addQueryStringMethod'] = NULL;
$renderChildrenClosure17 = function() {return NULL;};
$viewHelper18 = $self->getViewHelper('$viewHelper18', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper18->setArguments($arguments15);
$viewHelper18->setRenderingContext($renderingContext);
$viewHelper18->setRenderChildrenClosure($renderChildrenClosure17);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output6 .= $viewHelper18->initializeArgumentsAndRender();

$output6 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments19 = array();
$arguments19['key'] = 'widget.pagination.previous';
$arguments19['id'] = NULL;
$arguments19['default'] = NULL;
$arguments19['htmlEscape'] = NULL;
$arguments19['arguments'] = NULL;
$arguments19['extensionName'] = NULL;
$renderChildrenClosure20 = function() {return NULL;};

$output6 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments19, $renderChildrenClosure20, $renderingContext);

$output6 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments21 = array();
$arguments21['identifier'] = 'actions-view-paging-previous';
$arguments21['size'] = 'small';
$arguments21['overlay'] = NULL;
$arguments21['state'] = 'default';
$arguments21['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure22 = function() {return NULL;};

$output6 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments21, $renderChildrenClosure22, $renderingContext);

$output6 .= '
						</a>
					</li>
				';
return $output6;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments4, $renderChildrenClosure5, $renderingContext);

$output3 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments23 = array();
$renderChildrenClosure24 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output25 = '';

$output25 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments26 = array();
$arguments26['identifier'] = 'actions-view-paging-first';
$arguments26['size'] = 'small';
$arguments26['overlay'] = NULL;
$arguments26['state'] = 'default';
$arguments26['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure27 = function() {return NULL;};

$output25 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments26, $renderChildrenClosure27, $renderingContext);

$output25 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments28 = array();
$arguments28['identifier'] = 'actions-view-paging-previous';
$arguments28['size'] = 'small';
$arguments28['overlay'] = NULL;
$arguments28['state'] = 'default';
$arguments28['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure29 = function() {return NULL;};

$output25 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments28, $renderChildrenClosure29, $renderingContext);

$output25 .= '
						</span>
					</li>
				';
return $output25;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments23, $renderChildrenClosure24, $renderingContext);

$output3 .= '
			';
return $output3;
};
$arguments1['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output30 = '';

$output30 .= '
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments31 = array();
// Rendering Array
$array32 = array();
$array32['currentPage'] = 1;
$arguments31['arguments'] = $array32;
$arguments31['action'] = NULL;
$arguments31['section'] = '';
$arguments31['format'] = '';
$arguments31['ajax'] = false;
$arguments31['addQueryStringMethod'] = NULL;
$renderChildrenClosure33 = function() {return NULL;};
$viewHelper34 = $self->getViewHelper('$viewHelper34', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper34->setArguments($arguments31);
$viewHelper34->setRenderingContext($renderingContext);
$viewHelper34->setRenderChildrenClosure($renderChildrenClosure33);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output30 .= $viewHelper34->initializeArgumentsAndRender();

$output30 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments35 = array();
$arguments35['key'] = 'widget.pagination.first';
$arguments35['id'] = NULL;
$arguments35['default'] = NULL;
$arguments35['htmlEscape'] = NULL;
$arguments35['arguments'] = NULL;
$arguments35['extensionName'] = NULL;
$renderChildrenClosure36 = function() {return NULL;};

$output30 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments35, $renderChildrenClosure36, $renderingContext);

$output30 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments37 = array();
$arguments37['identifier'] = 'actions-view-paging-first';
$arguments37['size'] = 'small';
$arguments37['overlay'] = NULL;
$arguments37['state'] = 'default';
$arguments37['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure38 = function() {return NULL;};

$output30 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments37, $renderChildrenClosure38, $renderingContext);

$output30 .= '
						</a>
					</li>
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments39 = array();
// Rendering Array
$array40 = array();
$array40['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'previousPage', $renderingContext);
$arguments39['arguments'] = $array40;
$arguments39['action'] = NULL;
$arguments39['section'] = '';
$arguments39['format'] = '';
$arguments39['ajax'] = false;
$arguments39['addQueryStringMethod'] = NULL;
$renderChildrenClosure41 = function() {return NULL;};
$viewHelper42 = $self->getViewHelper('$viewHelper42', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper42->setArguments($arguments39);
$viewHelper42->setRenderingContext($renderingContext);
$viewHelper42->setRenderChildrenClosure($renderChildrenClosure41);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output30 .= $viewHelper42->initializeArgumentsAndRender();

$output30 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments43 = array();
$arguments43['key'] = 'widget.pagination.previous';
$arguments43['id'] = NULL;
$arguments43['default'] = NULL;
$arguments43['htmlEscape'] = NULL;
$arguments43['arguments'] = NULL;
$arguments43['extensionName'] = NULL;
$renderChildrenClosure44 = function() {return NULL;};

$output30 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments43, $renderChildrenClosure44, $renderingContext);

$output30 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments45 = array();
$arguments45['identifier'] = 'actions-view-paging-previous';
$arguments45['size'] = 'small';
$arguments45['overlay'] = NULL;
$arguments45['state'] = 'default';
$arguments45['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure46 = function() {return NULL;};

$output30 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments45, $renderChildrenClosure46, $renderingContext);

$output30 .= '
						</a>
					</li>
				';
return $output30;
};
$arguments1['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output47 = '';

$output47 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments48 = array();
$arguments48['identifier'] = 'actions-view-paging-first';
$arguments48['size'] = 'small';
$arguments48['overlay'] = NULL;
$arguments48['state'] = 'default';
$arguments48['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure49 = function() {return NULL;};

$output47 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments48, $renderChildrenClosure49, $renderingContext);

$output47 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments50 = array();
$arguments50['identifier'] = 'actions-view-paging-previous';
$arguments50['size'] = 'small';
$arguments50['overlay'] = NULL;
$arguments50['state'] = 'default';
$arguments50['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure51 = function() {return NULL;};

$output47 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments50, $renderChildrenClosure51, $renderingContext);

$output47 .= '
						</span>
					</li>
				';
return $output47;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '
			<li>
				<span>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments52 = array();
// Rendering Boolean node
$arguments52['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean($currentVariableContainer->getOrNull('recordsLabel'));
$arguments52['then'] = NULL;
$arguments52['else'] = NULL;
$renderChildrenClosure53 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output54 = '';

$output54 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments55 = array();
$renderChildrenClosure56 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output57 = '';

$output57 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments58 = array();
$arguments58['value'] = $currentVariableContainer->getOrNull('recordsLabel');
$arguments58['keepQuotes'] = false;
$arguments58['encoding'] = NULL;
$arguments58['doubleEncode'] = true;
$renderChildrenClosure59 = function() {return NULL;};
$value60 = ($arguments58['value'] !== NULL ? $arguments58['value'] : $renderChildrenClosure59());

$output57 .= (!is_string($value60) ? $value60 : htmlspecialchars($value60, ($arguments58['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments58['encoding'] !== NULL ? $arguments58['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments58['doubleEncode']));

$output57 .= '
						';
return $output57;
};

$output54 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments55, $renderChildrenClosure56, $renderingContext);

$output54 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments61 = array();
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output63 = '';

$output63 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments64 = array();
$arguments64['key'] = 'widget.pagination.records';
$arguments64['id'] = NULL;
$arguments64['default'] = NULL;
$arguments64['htmlEscape'] = NULL;
$arguments64['arguments'] = NULL;
$arguments64['extensionName'] = NULL;
$renderChildrenClosure65 = function() {return NULL;};

$output63 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments64, $renderChildrenClosure65, $renderingContext);

$output63 .= '
						';
return $output63;
};

$output54 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments61, $renderChildrenClosure62, $renderingContext);

$output54 .= '
					';
return $output54;
};
$arguments52['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output66 = '';

$output66 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments67 = array();
$arguments67['value'] = $currentVariableContainer->getOrNull('recordsLabel');
$arguments67['keepQuotes'] = false;
$arguments67['encoding'] = NULL;
$arguments67['doubleEncode'] = true;
$renderChildrenClosure68 = function() {return NULL;};
$value69 = ($arguments67['value'] !== NULL ? $arguments67['value'] : $renderChildrenClosure68());

$output66 .= (!is_string($value69) ? $value69 : htmlspecialchars($value69, ($arguments67['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments67['encoding'] !== NULL ? $arguments67['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments67['doubleEncode']));

$output66 .= '
						';
return $output66;
};
$arguments52['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output70 = '';

$output70 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments71 = array();
$arguments71['key'] = 'widget.pagination.records';
$arguments71['id'] = NULL;
$arguments71['default'] = NULL;
$arguments71['htmlEscape'] = NULL;
$arguments71['arguments'] = NULL;
$arguments71['extensionName'] = NULL;
$renderChildrenClosure72 = function() {return NULL;};

$output70 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments71, $renderChildrenClosure72, $renderingContext);

$output70 .= '
						';
return $output70;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments52, $renderChildrenClosure53, $renderingContext);

$output0 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments73 = array();
$arguments73['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'startRecord', $renderingContext);
$arguments73['keepQuotes'] = false;
$arguments73['encoding'] = NULL;
$arguments73['doubleEncode'] = true;
$renderChildrenClosure74 = function() {return NULL;};
$value75 = ($arguments73['value'] !== NULL ? $arguments73['value'] : $renderChildrenClosure74());

$output0 .= (!is_string($value75) ? $value75 : htmlspecialchars($value75, ($arguments73['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments73['encoding'] !== NULL ? $arguments73['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments73['doubleEncode']));

$output0 .= ' - ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments76 = array();
$arguments76['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'endRecord', $renderingContext);
$arguments76['keepQuotes'] = false;
$arguments76['encoding'] = NULL;
$arguments76['doubleEncode'] = true;
$renderChildrenClosure77 = function() {return NULL;};
$value78 = ($arguments76['value'] !== NULL ? $arguments76['value'] : $renderChildrenClosure77());

$output0 .= (!is_string($value78) ? $value78 : htmlspecialchars($value78, ($arguments76['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments76['encoding'] !== NULL ? $arguments76['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments76['doubleEncode']));

$output0 .= '
				</span>
			</li>
			<li>
				<span>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments79 = array();
$arguments79['key'] = 'widget.pagination.page';
$arguments79['id'] = NULL;
$arguments79['default'] = NULL;
$arguments79['htmlEscape'] = NULL;
$arguments79['arguments'] = NULL;
$arguments79['extensionName'] = NULL;
$renderChildrenClosure80 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments79, $renderChildrenClosure80, $renderingContext);

$output0 .= '

					<form id="paginator-form-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments81 = array();
$arguments81['value'] = $currentVariableContainer->getOrNull('position');
$arguments81['keepQuotes'] = false;
$arguments81['encoding'] = NULL;
$arguments81['doubleEncode'] = true;
$renderChildrenClosure82 = function() {return NULL;};
$value83 = ($arguments81['value'] !== NULL ? $arguments81['value'] : $renderChildrenClosure82());

$output0 .= (!is_string($value83) ? $value83 : htmlspecialchars($value83, ($arguments81['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments81['encoding'] !== NULL ? $arguments81['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments81['doubleEncode']));

$output0 .= '" onsubmit="goToPage';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments84 = array();
$arguments84['value'] = $currentVariableContainer->getOrNull('position');
$arguments84['keepQuotes'] = false;
$arguments84['encoding'] = NULL;
$arguments84['doubleEncode'] = true;
$renderChildrenClosure85 = function() {return NULL;};
$value86 = ($arguments84['value'] !== NULL ? $arguments84['value'] : $renderChildrenClosure85());

$output0 .= (!is_string($value86) ? $value86 : htmlspecialchars($value86, ($arguments84['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments84['encoding'] !== NULL ? $arguments84['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments84['doubleEncode']));

$output0 .= '(this); return false;" style="display:inline;">
					<script type="text/javascript">
						function goToPage';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments87 = array();
$arguments87['value'] = $currentVariableContainer->getOrNull('position');
$arguments87['keepQuotes'] = false;
$arguments87['encoding'] = NULL;
$arguments87['doubleEncode'] = true;
$renderChildrenClosure88 = function() {return NULL;};
$value89 = ($arguments87['value'] !== NULL ? $arguments87['value'] : $renderChildrenClosure88());

$output0 .= (!is_string($value89) ? $value89 : htmlspecialchars($value89, ($arguments87['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments87['encoding'] !== NULL ? $arguments87['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments87['doubleEncode']));

$output0 .= '(formObject) {
							var url = \'';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments90 = array();
// Rendering Array
$array91 = array();
$array91['currentPage'] = 987654321;
$arguments90['arguments'] = $array91;
$arguments90['action'] = NULL;
$arguments90['section'] = '';
$arguments90['format'] = '';
$arguments90['ajax'] = false;
$arguments90['addQueryStringMethod'] = NULL;
$renderChildrenClosure92 = function() {return NULL;};
$viewHelper93 = $self->getViewHelper('$viewHelper93', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper93->setArguments($arguments90);
$viewHelper93->setRenderingContext($renderingContext);
$viewHelper93->setRenderChildrenClosure($renderChildrenClosure92);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output0 .= $viewHelper93->initializeArgumentsAndRender();

$output0 .= '\';
							var page = formObject.elements[\'paginator-target-page\'].value;
							if (page > ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments94 = array();
$arguments94['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'numberOfPages', $renderingContext);
$arguments94['keepQuotes'] = false;
$arguments94['encoding'] = NULL;
$arguments94['doubleEncode'] = true;
$renderChildrenClosure95 = function() {return NULL;};
$value96 = ($arguments94['value'] !== NULL ? $arguments94['value'] : $renderChildrenClosure95());

$output0 .= (!is_string($value96) ? $value96 : htmlspecialchars($value96, ($arguments94['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments94['encoding'] !== NULL ? $arguments94['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments94['doubleEncode']));

$output0 .= ') {
								page = ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments97 = array();
$arguments97['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'numberOfPages', $renderingContext);
$arguments97['keepQuotes'] = false;
$arguments97['encoding'] = NULL;
$arguments97['doubleEncode'] = true;
$renderChildrenClosure98 = function() {return NULL;};
$value99 = ($arguments97['value'] !== NULL ? $arguments97['value'] : $renderChildrenClosure98());

$output0 .= (!is_string($value99) ? $value99 : htmlspecialchars($value99, ($arguments97['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments97['encoding'] !== NULL ? $arguments97['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments97['doubleEncode']));

$output0 .= ';
							} else if (page < 1) {
								page = 1;
							}
							url = url.replace(\'987654321\', page);
							self.location.href= url;
						}
					</script>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments100 = array();
$output101 = '';

$output101 .= 'paginator-';

$output101 .= $currentVariableContainer->getOrNull('position');
$arguments100['id'] = $output101;
$arguments100['name'] = 'paginator-target-page';
// Rendering Array
$array102 = array();
$array102['min'] = '1';
$arguments100['additionalAttributes'] = $array102;
$arguments100['class'] = 'form-control input-sm paginator-input';
$arguments100['size'] = '5';
$arguments100['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'current', $renderingContext);
$arguments100['type'] = 'number';
$arguments100['data'] = NULL;
$arguments100['required'] = false;
$arguments100['property'] = NULL;
$arguments100['autofocus'] = NULL;
$arguments100['disabled'] = NULL;
$arguments100['maxlength'] = NULL;
$arguments100['readonly'] = NULL;
$arguments100['placeholder'] = NULL;
$arguments100['pattern'] = NULL;
$arguments100['errorClass'] = 'f3-form-error';
$arguments100['dir'] = NULL;
$arguments100['lang'] = NULL;
$arguments100['style'] = NULL;
$arguments100['title'] = NULL;
$arguments100['accesskey'] = NULL;
$arguments100['tabindex'] = NULL;
$arguments100['onclick'] = NULL;
$renderChildrenClosure103 = function() {return NULL;};
$viewHelper104 = $self->getViewHelper('$viewHelper104', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper104->setArguments($arguments100);
$viewHelper104->setRenderingContext($renderingContext);
$viewHelper104->setRenderChildrenClosure($renderChildrenClosure103);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output0 .= $viewHelper104->initializeArgumentsAndRender();

$output0 .= '
					</form>

					/ ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments105 = array();
$arguments105['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'numberOfPages', $renderingContext);
$arguments105['keepQuotes'] = false;
$arguments105['encoding'] = NULL;
$arguments105['doubleEncode'] = true;
$renderChildrenClosure106 = function() {return NULL;};
$value107 = ($arguments105['value'] !== NULL ? $arguments105['value'] : $renderChildrenClosure106());

$output0 .= (!is_string($value107) ? $value107 : htmlspecialchars($value107, ($arguments105['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments105['encoding'] !== NULL ? $arguments105['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments105['doubleEncode']));

$output0 .= '
				</span>
			</li>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments108 = array();
// Rendering Boolean node
$arguments108['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'hasMorePages', $renderingContext));
$arguments108['then'] = NULL;
$arguments108['else'] = NULL;
$renderChildrenClosure109 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output110 = '';

$output110 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments111 = array();
$renderChildrenClosure112 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output113 = '';

$output113 .= '
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments114 = array();
// Rendering Array
$array115 = array();
$array115['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'nextPage', $renderingContext);
$arguments114['arguments'] = $array115;
$arguments114['action'] = NULL;
$arguments114['section'] = '';
$arguments114['format'] = '';
$arguments114['ajax'] = false;
$arguments114['addQueryStringMethod'] = NULL;
$renderChildrenClosure116 = function() {return NULL;};
$viewHelper117 = $self->getViewHelper('$viewHelper117', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper117->setArguments($arguments114);
$viewHelper117->setRenderingContext($renderingContext);
$viewHelper117->setRenderChildrenClosure($renderChildrenClosure116);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output113 .= $viewHelper117->initializeArgumentsAndRender();

$output113 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments118 = array();
$arguments118['key'] = 'widget.pagination.next';
$arguments118['id'] = NULL;
$arguments118['default'] = NULL;
$arguments118['htmlEscape'] = NULL;
$arguments118['arguments'] = NULL;
$arguments118['extensionName'] = NULL;
$renderChildrenClosure119 = function() {return NULL;};

$output113 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments118, $renderChildrenClosure119, $renderingContext);

$output113 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments120 = array();
$arguments120['identifier'] = 'actions-view-paging-next';
$arguments120['size'] = 'small';
$arguments120['overlay'] = NULL;
$arguments120['state'] = 'default';
$arguments120['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure121 = function() {return NULL;};

$output113 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments120, $renderChildrenClosure121, $renderingContext);

$output113 .= '
						</a>
					</li>
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments122 = array();
// Rendering Array
$array123 = array();
$array123['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'numberOfPages', $renderingContext);
$arguments122['arguments'] = $array123;
$arguments122['action'] = NULL;
$arguments122['section'] = '';
$arguments122['format'] = '';
$arguments122['ajax'] = false;
$arguments122['addQueryStringMethod'] = NULL;
$renderChildrenClosure124 = function() {return NULL;};
$viewHelper125 = $self->getViewHelper('$viewHelper125', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper125->setArguments($arguments122);
$viewHelper125->setRenderingContext($renderingContext);
$viewHelper125->setRenderChildrenClosure($renderChildrenClosure124);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output113 .= $viewHelper125->initializeArgumentsAndRender();

$output113 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments126 = array();
$arguments126['key'] = 'widget.pagination.last';
$arguments126['id'] = NULL;
$arguments126['default'] = NULL;
$arguments126['htmlEscape'] = NULL;
$arguments126['arguments'] = NULL;
$arguments126['extensionName'] = NULL;
$renderChildrenClosure127 = function() {return NULL;};

$output113 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments126, $renderChildrenClosure127, $renderingContext);

$output113 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments128 = array();
$arguments128['identifier'] = 'actions-view-paging-last';
$arguments128['size'] = 'small';
$arguments128['overlay'] = NULL;
$arguments128['state'] = 'default';
$arguments128['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure129 = function() {return NULL;};

$output113 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments128, $renderChildrenClosure129, $renderingContext);

$output113 .= '
						</a>
					</li>
				';
return $output113;
};

$output110 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments111, $renderChildrenClosure112, $renderingContext);

$output110 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments130 = array();
$renderChildrenClosure131 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output132 = '';

$output132 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments133 = array();
$arguments133['identifier'] = 'actions-view-paging-next';
$arguments133['size'] = 'small';
$arguments133['overlay'] = NULL;
$arguments133['state'] = 'default';
$arguments133['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure134 = function() {return NULL;};

$output132 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments133, $renderChildrenClosure134, $renderingContext);

$output132 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments135 = array();
$arguments135['identifier'] = 'actions-view-paging-last';
$arguments135['size'] = 'small';
$arguments135['overlay'] = NULL;
$arguments135['state'] = 'default';
$arguments135['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure136 = function() {return NULL;};

$output132 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments135, $renderChildrenClosure136, $renderingContext);

$output132 .= '
						</span>
					</li>
				';
return $output132;
};

$output110 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments130, $renderChildrenClosure131, $renderingContext);

$output110 .= '
			';
return $output110;
};
$arguments108['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output137 = '';

$output137 .= '
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments138 = array();
// Rendering Array
$array139 = array();
$array139['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'nextPage', $renderingContext);
$arguments138['arguments'] = $array139;
$arguments138['action'] = NULL;
$arguments138['section'] = '';
$arguments138['format'] = '';
$arguments138['ajax'] = false;
$arguments138['addQueryStringMethod'] = NULL;
$renderChildrenClosure140 = function() {return NULL;};
$viewHelper141 = $self->getViewHelper('$viewHelper141', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper141->setArguments($arguments138);
$viewHelper141->setRenderingContext($renderingContext);
$viewHelper141->setRenderChildrenClosure($renderChildrenClosure140);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output137 .= $viewHelper141->initializeArgumentsAndRender();

$output137 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments142 = array();
$arguments142['key'] = 'widget.pagination.next';
$arguments142['id'] = NULL;
$arguments142['default'] = NULL;
$arguments142['htmlEscape'] = NULL;
$arguments142['arguments'] = NULL;
$arguments142['extensionName'] = NULL;
$renderChildrenClosure143 = function() {return NULL;};

$output137 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments142, $renderChildrenClosure143, $renderingContext);

$output137 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments144 = array();
$arguments144['identifier'] = 'actions-view-paging-next';
$arguments144['size'] = 'small';
$arguments144['overlay'] = NULL;
$arguments144['state'] = 'default';
$arguments144['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure145 = function() {return NULL;};

$output137 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments144, $renderChildrenClosure145, $renderingContext);

$output137 .= '
						</a>
					</li>
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments146 = array();
// Rendering Array
$array147 = array();
$array147['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'numberOfPages', $renderingContext);
$arguments146['arguments'] = $array147;
$arguments146['action'] = NULL;
$arguments146['section'] = '';
$arguments146['format'] = '';
$arguments146['ajax'] = false;
$arguments146['addQueryStringMethod'] = NULL;
$renderChildrenClosure148 = function() {return NULL;};
$viewHelper149 = $self->getViewHelper('$viewHelper149', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper149->setArguments($arguments146);
$viewHelper149->setRenderingContext($renderingContext);
$viewHelper149->setRenderChildrenClosure($renderChildrenClosure148);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output137 .= $viewHelper149->initializeArgumentsAndRender();

$output137 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments150 = array();
$arguments150['key'] = 'widget.pagination.last';
$arguments150['id'] = NULL;
$arguments150['default'] = NULL;
$arguments150['htmlEscape'] = NULL;
$arguments150['arguments'] = NULL;
$arguments150['extensionName'] = NULL;
$renderChildrenClosure151 = function() {return NULL;};

$output137 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments150, $renderChildrenClosure151, $renderingContext);

$output137 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments152 = array();
$arguments152['identifier'] = 'actions-view-paging-last';
$arguments152['size'] = 'small';
$arguments152['overlay'] = NULL;
$arguments152['state'] = 'default';
$arguments152['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure153 = function() {return NULL;};

$output137 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments152, $renderChildrenClosure153, $renderingContext);

$output137 .= '
						</a>
					</li>
				';
return $output137;
};
$arguments108['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output154 = '';

$output154 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments155 = array();
$arguments155['identifier'] = 'actions-view-paging-next';
$arguments155['size'] = 'small';
$arguments155['overlay'] = NULL;
$arguments155['state'] = 'default';
$arguments155['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure156 = function() {return NULL;};

$output154 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments155, $renderChildrenClosure156, $renderingContext);

$output154 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments157 = array();
$arguments157['identifier'] = 'actions-view-paging-last';
$arguments157['size'] = 'small';
$arguments157['overlay'] = NULL;
$arguments157['state'] = 'default';
$arguments157['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure158 = function() {return NULL;};

$output154 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments157, $renderChildrenClosure158, $renderingContext);

$output154 .= '
						</span>
					</li>
				';
return $output154;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments108, $renderChildrenClosure109, $renderingContext);

$output0 .= '
			<li>
				<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments159 = array();
// Rendering Array
$array160 = array();
$array160['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'current', $renderingContext);
$arguments159['arguments'] = $array160;
$arguments159['action'] = NULL;
$arguments159['section'] = '';
$arguments159['format'] = '';
$arguments159['ajax'] = false;
$arguments159['addQueryStringMethod'] = NULL;
$renderChildrenClosure161 = function() {return NULL;};
$viewHelper162 = $self->getViewHelper('$viewHelper162', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper162->setArguments($arguments159);
$viewHelper162->setRenderingContext($renderingContext);
$viewHelper162->setRenderChildrenClosure($renderChildrenClosure161);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output0 .= $viewHelper162->initializeArgumentsAndRender();

$output0 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments163 = array();
$arguments163['key'] = 'widget.pagination.refresh';
$arguments163['id'] = NULL;
$arguments163['default'] = NULL;
$arguments163['htmlEscape'] = NULL;
$arguments163['arguments'] = NULL;
$arguments163['extensionName'] = NULL;
$renderChildrenClosure164 = function() {return NULL;};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments163, $renderChildrenClosure164, $renderingContext);

$output0 .= '">
					';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments165 = array();
$arguments165['identifier'] = 'actions-refresh';
$arguments165['size'] = 'small';
$arguments165['overlay'] = NULL;
$arguments165['state'] = 'default';
$arguments165['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure166 = function() {return NULL;};

$output0 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments165, $renderChildrenClosure166, $renderingContext);

$output0 .= '
				</a>
			</li>
		</ul>
	</nav>
';


return $output0;
}
/**
 * Main Render function
 */
public function render(\TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface $renderingContext) {
$self = $this;
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();

$output167 = '';

$output167 .= '
';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments168 = array();
// Rendering Boolean node
$arguments168['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('configuration'), 'insertAbove', $renderingContext));
$arguments168['then'] = NULL;
$arguments168['else'] = NULL;
$renderChildrenClosure169 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output170 = '';

$output170 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments171 = array();
$arguments171['section'] = 'paginator';
// Rendering Array
$array172 = array();
$array172['pagination'] = $currentVariableContainer->getOrNull('pagination');
$array172['position'] = 'top';
$array172['recordsLabel'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('configuration'), 'recordsLabel', $renderingContext);
$arguments171['arguments'] = $array172;
$arguments171['partial'] = NULL;
$arguments171['optional'] = false;
$renderChildrenClosure173 = function() {return NULL;};

$output170 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments171, $renderChildrenClosure173, $renderingContext);

$output170 .= '
';
return $output170;
};

$output167 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments168, $renderChildrenClosure169, $renderingContext);

$output167 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderChildrenViewHelper
$arguments174 = array();
$arguments174['arguments'] = $currentVariableContainer->getOrNull('contentArguments');
$renderChildrenClosure175 = function() {return NULL;};
$viewHelper176 = $self->getViewHelper('$viewHelper176', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\RenderChildrenViewHelper');
$viewHelper176->setArguments($arguments174);
$viewHelper176->setRenderingContext($renderingContext);
$viewHelper176->setRenderChildrenClosure($renderChildrenClosure175);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderChildrenViewHelper

$output167 .= $viewHelper176->initializeArgumentsAndRender();

$output167 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments177 = array();
// Rendering Boolean node
$arguments177['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('configuration'), 'insertBelow', $renderingContext));
$arguments177['then'] = NULL;
$arguments177['else'] = NULL;
$renderChildrenClosure178 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output179 = '';

$output179 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments180 = array();
$arguments180['section'] = 'paginator';
// Rendering Array
$array181 = array();
$array181['pagination'] = $currentVariableContainer->getOrNull('pagination');
$array181['position'] = 'bottom';
$array181['recordsLabel'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('configuration'), 'recordsLabel', $renderingContext);
$arguments180['arguments'] = $array181;
$arguments180['partial'] = NULL;
$arguments180['optional'] = false;
$renderChildrenClosure182 = function() {return NULL;};

$output179 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments180, $renderChildrenClosure182, $renderingContext);

$output179 .= '
';
return $output179;
};

$output167 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments177, $renderChildrenClosure178, $renderingContext);

$output167 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments183 = array();
$arguments183['name'] = 'paginator';
$renderChildrenClosure184 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output185 = '';

$output185 .= '
	<nav class="pagination-wrap">
		<ul class="pagination pagination-block">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments186 = array();
// Rendering Boolean node
$arguments186['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'hasLessPages', $renderingContext));
$arguments186['then'] = NULL;
$arguments186['else'] = NULL;
$renderChildrenClosure187 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output188 = '';

$output188 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments189 = array();
$renderChildrenClosure190 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output191 = '';

$output191 .= '
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments192 = array();
// Rendering Array
$array193 = array();
$array193['currentPage'] = 1;
$arguments192['arguments'] = $array193;
$arguments192['action'] = NULL;
$arguments192['section'] = '';
$arguments192['format'] = '';
$arguments192['ajax'] = false;
$arguments192['addQueryStringMethod'] = NULL;
$renderChildrenClosure194 = function() {return NULL;};
$viewHelper195 = $self->getViewHelper('$viewHelper195', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper195->setArguments($arguments192);
$viewHelper195->setRenderingContext($renderingContext);
$viewHelper195->setRenderChildrenClosure($renderChildrenClosure194);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output191 .= $viewHelper195->initializeArgumentsAndRender();

$output191 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments196 = array();
$arguments196['key'] = 'widget.pagination.first';
$arguments196['id'] = NULL;
$arguments196['default'] = NULL;
$arguments196['htmlEscape'] = NULL;
$arguments196['arguments'] = NULL;
$arguments196['extensionName'] = NULL;
$renderChildrenClosure197 = function() {return NULL;};

$output191 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments196, $renderChildrenClosure197, $renderingContext);

$output191 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments198 = array();
$arguments198['identifier'] = 'actions-view-paging-first';
$arguments198['size'] = 'small';
$arguments198['overlay'] = NULL;
$arguments198['state'] = 'default';
$arguments198['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure199 = function() {return NULL;};

$output191 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments198, $renderChildrenClosure199, $renderingContext);

$output191 .= '
						</a>
					</li>
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments200 = array();
// Rendering Array
$array201 = array();
$array201['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'previousPage', $renderingContext);
$arguments200['arguments'] = $array201;
$arguments200['action'] = NULL;
$arguments200['section'] = '';
$arguments200['format'] = '';
$arguments200['ajax'] = false;
$arguments200['addQueryStringMethod'] = NULL;
$renderChildrenClosure202 = function() {return NULL;};
$viewHelper203 = $self->getViewHelper('$viewHelper203', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper203->setArguments($arguments200);
$viewHelper203->setRenderingContext($renderingContext);
$viewHelper203->setRenderChildrenClosure($renderChildrenClosure202);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output191 .= $viewHelper203->initializeArgumentsAndRender();

$output191 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments204 = array();
$arguments204['key'] = 'widget.pagination.previous';
$arguments204['id'] = NULL;
$arguments204['default'] = NULL;
$arguments204['htmlEscape'] = NULL;
$arguments204['arguments'] = NULL;
$arguments204['extensionName'] = NULL;
$renderChildrenClosure205 = function() {return NULL;};

$output191 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments204, $renderChildrenClosure205, $renderingContext);

$output191 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments206 = array();
$arguments206['identifier'] = 'actions-view-paging-previous';
$arguments206['size'] = 'small';
$arguments206['overlay'] = NULL;
$arguments206['state'] = 'default';
$arguments206['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure207 = function() {return NULL;};

$output191 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments206, $renderChildrenClosure207, $renderingContext);

$output191 .= '
						</a>
					</li>
				';
return $output191;
};

$output188 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments189, $renderChildrenClosure190, $renderingContext);

$output188 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments208 = array();
$renderChildrenClosure209 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output210 = '';

$output210 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments211 = array();
$arguments211['identifier'] = 'actions-view-paging-first';
$arguments211['size'] = 'small';
$arguments211['overlay'] = NULL;
$arguments211['state'] = 'default';
$arguments211['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure212 = function() {return NULL;};

$output210 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments211, $renderChildrenClosure212, $renderingContext);

$output210 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments213 = array();
$arguments213['identifier'] = 'actions-view-paging-previous';
$arguments213['size'] = 'small';
$arguments213['overlay'] = NULL;
$arguments213['state'] = 'default';
$arguments213['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure214 = function() {return NULL;};

$output210 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments213, $renderChildrenClosure214, $renderingContext);

$output210 .= '
						</span>
					</li>
				';
return $output210;
};

$output188 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments208, $renderChildrenClosure209, $renderingContext);

$output188 .= '
			';
return $output188;
};
$arguments186['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output215 = '';

$output215 .= '
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments216 = array();
// Rendering Array
$array217 = array();
$array217['currentPage'] = 1;
$arguments216['arguments'] = $array217;
$arguments216['action'] = NULL;
$arguments216['section'] = '';
$arguments216['format'] = '';
$arguments216['ajax'] = false;
$arguments216['addQueryStringMethod'] = NULL;
$renderChildrenClosure218 = function() {return NULL;};
$viewHelper219 = $self->getViewHelper('$viewHelper219', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper219->setArguments($arguments216);
$viewHelper219->setRenderingContext($renderingContext);
$viewHelper219->setRenderChildrenClosure($renderChildrenClosure218);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output215 .= $viewHelper219->initializeArgumentsAndRender();

$output215 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments220 = array();
$arguments220['key'] = 'widget.pagination.first';
$arguments220['id'] = NULL;
$arguments220['default'] = NULL;
$arguments220['htmlEscape'] = NULL;
$arguments220['arguments'] = NULL;
$arguments220['extensionName'] = NULL;
$renderChildrenClosure221 = function() {return NULL;};

$output215 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments220, $renderChildrenClosure221, $renderingContext);

$output215 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments222 = array();
$arguments222['identifier'] = 'actions-view-paging-first';
$arguments222['size'] = 'small';
$arguments222['overlay'] = NULL;
$arguments222['state'] = 'default';
$arguments222['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure223 = function() {return NULL;};

$output215 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments222, $renderChildrenClosure223, $renderingContext);

$output215 .= '
						</a>
					</li>
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments224 = array();
// Rendering Array
$array225 = array();
$array225['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'previousPage', $renderingContext);
$arguments224['arguments'] = $array225;
$arguments224['action'] = NULL;
$arguments224['section'] = '';
$arguments224['format'] = '';
$arguments224['ajax'] = false;
$arguments224['addQueryStringMethod'] = NULL;
$renderChildrenClosure226 = function() {return NULL;};
$viewHelper227 = $self->getViewHelper('$viewHelper227', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper227->setArguments($arguments224);
$viewHelper227->setRenderingContext($renderingContext);
$viewHelper227->setRenderChildrenClosure($renderChildrenClosure226);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output215 .= $viewHelper227->initializeArgumentsAndRender();

$output215 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments228 = array();
$arguments228['key'] = 'widget.pagination.previous';
$arguments228['id'] = NULL;
$arguments228['default'] = NULL;
$arguments228['htmlEscape'] = NULL;
$arguments228['arguments'] = NULL;
$arguments228['extensionName'] = NULL;
$renderChildrenClosure229 = function() {return NULL;};

$output215 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments228, $renderChildrenClosure229, $renderingContext);

$output215 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments230 = array();
$arguments230['identifier'] = 'actions-view-paging-previous';
$arguments230['size'] = 'small';
$arguments230['overlay'] = NULL;
$arguments230['state'] = 'default';
$arguments230['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure231 = function() {return NULL;};

$output215 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments230, $renderChildrenClosure231, $renderingContext);

$output215 .= '
						</a>
					</li>
				';
return $output215;
};
$arguments186['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output232 = '';

$output232 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments233 = array();
$arguments233['identifier'] = 'actions-view-paging-first';
$arguments233['size'] = 'small';
$arguments233['overlay'] = NULL;
$arguments233['state'] = 'default';
$arguments233['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure234 = function() {return NULL;};

$output232 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments233, $renderChildrenClosure234, $renderingContext);

$output232 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments235 = array();
$arguments235['identifier'] = 'actions-view-paging-previous';
$arguments235['size'] = 'small';
$arguments235['overlay'] = NULL;
$arguments235['state'] = 'default';
$arguments235['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure236 = function() {return NULL;};

$output232 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments235, $renderChildrenClosure236, $renderingContext);

$output232 .= '
						</span>
					</li>
				';
return $output232;
};

$output185 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments186, $renderChildrenClosure187, $renderingContext);

$output185 .= '
			<li>
				<span>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments237 = array();
// Rendering Boolean node
$arguments237['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean($currentVariableContainer->getOrNull('recordsLabel'));
$arguments237['then'] = NULL;
$arguments237['else'] = NULL;
$renderChildrenClosure238 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output239 = '';

$output239 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments240 = array();
$renderChildrenClosure241 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output242 = '';

$output242 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments243 = array();
$arguments243['value'] = $currentVariableContainer->getOrNull('recordsLabel');
$arguments243['keepQuotes'] = false;
$arguments243['encoding'] = NULL;
$arguments243['doubleEncode'] = true;
$renderChildrenClosure244 = function() {return NULL;};
$value245 = ($arguments243['value'] !== NULL ? $arguments243['value'] : $renderChildrenClosure244());

$output242 .= (!is_string($value245) ? $value245 : htmlspecialchars($value245, ($arguments243['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments243['encoding'] !== NULL ? $arguments243['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments243['doubleEncode']));

$output242 .= '
						';
return $output242;
};

$output239 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments240, $renderChildrenClosure241, $renderingContext);

$output239 .= '
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments246 = array();
$renderChildrenClosure247 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output248 = '';

$output248 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments249 = array();
$arguments249['key'] = 'widget.pagination.records';
$arguments249['id'] = NULL;
$arguments249['default'] = NULL;
$arguments249['htmlEscape'] = NULL;
$arguments249['arguments'] = NULL;
$arguments249['extensionName'] = NULL;
$renderChildrenClosure250 = function() {return NULL;};

$output248 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments249, $renderChildrenClosure250, $renderingContext);

$output248 .= '
						';
return $output248;
};

$output239 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments246, $renderChildrenClosure247, $renderingContext);

$output239 .= '
					';
return $output239;
};
$arguments237['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output251 = '';

$output251 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments252 = array();
$arguments252['value'] = $currentVariableContainer->getOrNull('recordsLabel');
$arguments252['keepQuotes'] = false;
$arguments252['encoding'] = NULL;
$arguments252['doubleEncode'] = true;
$renderChildrenClosure253 = function() {return NULL;};
$value254 = ($arguments252['value'] !== NULL ? $arguments252['value'] : $renderChildrenClosure253());

$output251 .= (!is_string($value254) ? $value254 : htmlspecialchars($value254, ($arguments252['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments252['encoding'] !== NULL ? $arguments252['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments252['doubleEncode']));

$output251 .= '
						';
return $output251;
};
$arguments237['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output255 = '';

$output255 .= '
							';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments256 = array();
$arguments256['key'] = 'widget.pagination.records';
$arguments256['id'] = NULL;
$arguments256['default'] = NULL;
$arguments256['htmlEscape'] = NULL;
$arguments256['arguments'] = NULL;
$arguments256['extensionName'] = NULL;
$renderChildrenClosure257 = function() {return NULL;};

$output255 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments256, $renderChildrenClosure257, $renderingContext);

$output255 .= '
						';
return $output255;
};

$output185 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments237, $renderChildrenClosure238, $renderingContext);

$output185 .= '
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments258 = array();
$arguments258['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'startRecord', $renderingContext);
$arguments258['keepQuotes'] = false;
$arguments258['encoding'] = NULL;
$arguments258['doubleEncode'] = true;
$renderChildrenClosure259 = function() {return NULL;};
$value260 = ($arguments258['value'] !== NULL ? $arguments258['value'] : $renderChildrenClosure259());

$output185 .= (!is_string($value260) ? $value260 : htmlspecialchars($value260, ($arguments258['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments258['encoding'] !== NULL ? $arguments258['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments258['doubleEncode']));

$output185 .= ' - ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments261 = array();
$arguments261['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'endRecord', $renderingContext);
$arguments261['keepQuotes'] = false;
$arguments261['encoding'] = NULL;
$arguments261['doubleEncode'] = true;
$renderChildrenClosure262 = function() {return NULL;};
$value263 = ($arguments261['value'] !== NULL ? $arguments261['value'] : $renderChildrenClosure262());

$output185 .= (!is_string($value263) ? $value263 : htmlspecialchars($value263, ($arguments261['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments261['encoding'] !== NULL ? $arguments261['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments261['doubleEncode']));

$output185 .= '
				</span>
			</li>
			<li>
				<span>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments264 = array();
$arguments264['key'] = 'widget.pagination.page';
$arguments264['id'] = NULL;
$arguments264['default'] = NULL;
$arguments264['htmlEscape'] = NULL;
$arguments264['arguments'] = NULL;
$arguments264['extensionName'] = NULL;
$renderChildrenClosure265 = function() {return NULL;};

$output185 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments264, $renderChildrenClosure265, $renderingContext);

$output185 .= '

					<form id="paginator-form-';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments266 = array();
$arguments266['value'] = $currentVariableContainer->getOrNull('position');
$arguments266['keepQuotes'] = false;
$arguments266['encoding'] = NULL;
$arguments266['doubleEncode'] = true;
$renderChildrenClosure267 = function() {return NULL;};
$value268 = ($arguments266['value'] !== NULL ? $arguments266['value'] : $renderChildrenClosure267());

$output185 .= (!is_string($value268) ? $value268 : htmlspecialchars($value268, ($arguments266['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments266['encoding'] !== NULL ? $arguments266['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments266['doubleEncode']));

$output185 .= '" onsubmit="goToPage';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments269 = array();
$arguments269['value'] = $currentVariableContainer->getOrNull('position');
$arguments269['keepQuotes'] = false;
$arguments269['encoding'] = NULL;
$arguments269['doubleEncode'] = true;
$renderChildrenClosure270 = function() {return NULL;};
$value271 = ($arguments269['value'] !== NULL ? $arguments269['value'] : $renderChildrenClosure270());

$output185 .= (!is_string($value271) ? $value271 : htmlspecialchars($value271, ($arguments269['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments269['encoding'] !== NULL ? $arguments269['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments269['doubleEncode']));

$output185 .= '(this); return false;" style="display:inline;">
					<script type="text/javascript">
						function goToPage';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments272 = array();
$arguments272['value'] = $currentVariableContainer->getOrNull('position');
$arguments272['keepQuotes'] = false;
$arguments272['encoding'] = NULL;
$arguments272['doubleEncode'] = true;
$renderChildrenClosure273 = function() {return NULL;};
$value274 = ($arguments272['value'] !== NULL ? $arguments272['value'] : $renderChildrenClosure273());

$output185 .= (!is_string($value274) ? $value274 : htmlspecialchars($value274, ($arguments272['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments272['encoding'] !== NULL ? $arguments272['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments272['doubleEncode']));

$output185 .= '(formObject) {
							var url = \'';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments275 = array();
// Rendering Array
$array276 = array();
$array276['currentPage'] = 987654321;
$arguments275['arguments'] = $array276;
$arguments275['action'] = NULL;
$arguments275['section'] = '';
$arguments275['format'] = '';
$arguments275['ajax'] = false;
$arguments275['addQueryStringMethod'] = NULL;
$renderChildrenClosure277 = function() {return NULL;};
$viewHelper278 = $self->getViewHelper('$viewHelper278', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper278->setArguments($arguments275);
$viewHelper278->setRenderingContext($renderingContext);
$viewHelper278->setRenderChildrenClosure($renderChildrenClosure277);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output185 .= $viewHelper278->initializeArgumentsAndRender();

$output185 .= '\';
							var page = formObject.elements[\'paginator-target-page\'].value;
							if (page > ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments279 = array();
$arguments279['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'numberOfPages', $renderingContext);
$arguments279['keepQuotes'] = false;
$arguments279['encoding'] = NULL;
$arguments279['doubleEncode'] = true;
$renderChildrenClosure280 = function() {return NULL;};
$value281 = ($arguments279['value'] !== NULL ? $arguments279['value'] : $renderChildrenClosure280());

$output185 .= (!is_string($value281) ? $value281 : htmlspecialchars($value281, ($arguments279['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments279['encoding'] !== NULL ? $arguments279['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments279['doubleEncode']));

$output185 .= ') {
								page = ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments282 = array();
$arguments282['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'numberOfPages', $renderingContext);
$arguments282['keepQuotes'] = false;
$arguments282['encoding'] = NULL;
$arguments282['doubleEncode'] = true;
$renderChildrenClosure283 = function() {return NULL;};
$value284 = ($arguments282['value'] !== NULL ? $arguments282['value'] : $renderChildrenClosure283());

$output185 .= (!is_string($value284) ? $value284 : htmlspecialchars($value284, ($arguments282['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments282['encoding'] !== NULL ? $arguments282['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments282['doubleEncode']));

$output185 .= ';
							} else if (page < 1) {
								page = 1;
							}
							url = url.replace(\'987654321\', page);
							self.location.href= url;
						}
					</script>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments285 = array();
$output286 = '';

$output286 .= 'paginator-';

$output286 .= $currentVariableContainer->getOrNull('position');
$arguments285['id'] = $output286;
$arguments285['name'] = 'paginator-target-page';
// Rendering Array
$array287 = array();
$array287['min'] = '1';
$arguments285['additionalAttributes'] = $array287;
$arguments285['class'] = 'form-control input-sm paginator-input';
$arguments285['size'] = '5';
$arguments285['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'current', $renderingContext);
$arguments285['type'] = 'number';
$arguments285['data'] = NULL;
$arguments285['required'] = false;
$arguments285['property'] = NULL;
$arguments285['autofocus'] = NULL;
$arguments285['disabled'] = NULL;
$arguments285['maxlength'] = NULL;
$arguments285['readonly'] = NULL;
$arguments285['placeholder'] = NULL;
$arguments285['pattern'] = NULL;
$arguments285['errorClass'] = 'f3-form-error';
$arguments285['dir'] = NULL;
$arguments285['lang'] = NULL;
$arguments285['style'] = NULL;
$arguments285['title'] = NULL;
$arguments285['accesskey'] = NULL;
$arguments285['tabindex'] = NULL;
$arguments285['onclick'] = NULL;
$renderChildrenClosure288 = function() {return NULL;};
$viewHelper289 = $self->getViewHelper('$viewHelper289', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper289->setArguments($arguments285);
$viewHelper289->setRenderingContext($renderingContext);
$viewHelper289->setRenderChildrenClosure($renderChildrenClosure288);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output185 .= $viewHelper289->initializeArgumentsAndRender();

$output185 .= '
					</form>

					/ ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments290 = array();
$arguments290['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'numberOfPages', $renderingContext);
$arguments290['keepQuotes'] = false;
$arguments290['encoding'] = NULL;
$arguments290['doubleEncode'] = true;
$renderChildrenClosure291 = function() {return NULL;};
$value292 = ($arguments290['value'] !== NULL ? $arguments290['value'] : $renderChildrenClosure291());

$output185 .= (!is_string($value292) ? $value292 : htmlspecialchars($value292, ($arguments290['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments290['encoding'] !== NULL ? $arguments290['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments290['doubleEncode']));

$output185 .= '
				</span>
			</li>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments293 = array();
// Rendering Boolean node
$arguments293['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'hasMorePages', $renderingContext));
$arguments293['then'] = NULL;
$arguments293['else'] = NULL;
$renderChildrenClosure294 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output295 = '';

$output295 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments296 = array();
$renderChildrenClosure297 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output298 = '';

$output298 .= '
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments299 = array();
// Rendering Array
$array300 = array();
$array300['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'nextPage', $renderingContext);
$arguments299['arguments'] = $array300;
$arguments299['action'] = NULL;
$arguments299['section'] = '';
$arguments299['format'] = '';
$arguments299['ajax'] = false;
$arguments299['addQueryStringMethod'] = NULL;
$renderChildrenClosure301 = function() {return NULL;};
$viewHelper302 = $self->getViewHelper('$viewHelper302', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper302->setArguments($arguments299);
$viewHelper302->setRenderingContext($renderingContext);
$viewHelper302->setRenderChildrenClosure($renderChildrenClosure301);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output298 .= $viewHelper302->initializeArgumentsAndRender();

$output298 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments303 = array();
$arguments303['key'] = 'widget.pagination.next';
$arguments303['id'] = NULL;
$arguments303['default'] = NULL;
$arguments303['htmlEscape'] = NULL;
$arguments303['arguments'] = NULL;
$arguments303['extensionName'] = NULL;
$renderChildrenClosure304 = function() {return NULL;};

$output298 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments303, $renderChildrenClosure304, $renderingContext);

$output298 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments305 = array();
$arguments305['identifier'] = 'actions-view-paging-next';
$arguments305['size'] = 'small';
$arguments305['overlay'] = NULL;
$arguments305['state'] = 'default';
$arguments305['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure306 = function() {return NULL;};

$output298 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments305, $renderChildrenClosure306, $renderingContext);

$output298 .= '
						</a>
					</li>
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments307 = array();
// Rendering Array
$array308 = array();
$array308['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'numberOfPages', $renderingContext);
$arguments307['arguments'] = $array308;
$arguments307['action'] = NULL;
$arguments307['section'] = '';
$arguments307['format'] = '';
$arguments307['ajax'] = false;
$arguments307['addQueryStringMethod'] = NULL;
$renderChildrenClosure309 = function() {return NULL;};
$viewHelper310 = $self->getViewHelper('$viewHelper310', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper310->setArguments($arguments307);
$viewHelper310->setRenderingContext($renderingContext);
$viewHelper310->setRenderChildrenClosure($renderChildrenClosure309);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output298 .= $viewHelper310->initializeArgumentsAndRender();

$output298 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments311 = array();
$arguments311['key'] = 'widget.pagination.last';
$arguments311['id'] = NULL;
$arguments311['default'] = NULL;
$arguments311['htmlEscape'] = NULL;
$arguments311['arguments'] = NULL;
$arguments311['extensionName'] = NULL;
$renderChildrenClosure312 = function() {return NULL;};

$output298 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments311, $renderChildrenClosure312, $renderingContext);

$output298 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments313 = array();
$arguments313['identifier'] = 'actions-view-paging-last';
$arguments313['size'] = 'small';
$arguments313['overlay'] = NULL;
$arguments313['state'] = 'default';
$arguments313['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure314 = function() {return NULL;};

$output298 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments313, $renderChildrenClosure314, $renderingContext);

$output298 .= '
						</a>
					</li>
				';
return $output298;
};

$output295 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments296, $renderChildrenClosure297, $renderingContext);

$output295 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments315 = array();
$renderChildrenClosure316 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output317 = '';

$output317 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments318 = array();
$arguments318['identifier'] = 'actions-view-paging-next';
$arguments318['size'] = 'small';
$arguments318['overlay'] = NULL;
$arguments318['state'] = 'default';
$arguments318['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure319 = function() {return NULL;};

$output317 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments318, $renderChildrenClosure319, $renderingContext);

$output317 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments320 = array();
$arguments320['identifier'] = 'actions-view-paging-last';
$arguments320['size'] = 'small';
$arguments320['overlay'] = NULL;
$arguments320['state'] = 'default';
$arguments320['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure321 = function() {return NULL;};

$output317 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments320, $renderChildrenClosure321, $renderingContext);

$output317 .= '
						</span>
					</li>
				';
return $output317;
};

$output295 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments315, $renderChildrenClosure316, $renderingContext);

$output295 .= '
			';
return $output295;
};
$arguments293['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output322 = '';

$output322 .= '
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments323 = array();
// Rendering Array
$array324 = array();
$array324['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'nextPage', $renderingContext);
$arguments323['arguments'] = $array324;
$arguments323['action'] = NULL;
$arguments323['section'] = '';
$arguments323['format'] = '';
$arguments323['ajax'] = false;
$arguments323['addQueryStringMethod'] = NULL;
$renderChildrenClosure325 = function() {return NULL;};
$viewHelper326 = $self->getViewHelper('$viewHelper326', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper326->setArguments($arguments323);
$viewHelper326->setRenderingContext($renderingContext);
$viewHelper326->setRenderChildrenClosure($renderChildrenClosure325);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output322 .= $viewHelper326->initializeArgumentsAndRender();

$output322 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments327 = array();
$arguments327['key'] = 'widget.pagination.next';
$arguments327['id'] = NULL;
$arguments327['default'] = NULL;
$arguments327['htmlEscape'] = NULL;
$arguments327['arguments'] = NULL;
$arguments327['extensionName'] = NULL;
$renderChildrenClosure328 = function() {return NULL;};

$output322 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments327, $renderChildrenClosure328, $renderingContext);

$output322 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments329 = array();
$arguments329['identifier'] = 'actions-view-paging-next';
$arguments329['size'] = 'small';
$arguments329['overlay'] = NULL;
$arguments329['state'] = 'default';
$arguments329['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure330 = function() {return NULL;};

$output322 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments329, $renderChildrenClosure330, $renderingContext);

$output322 .= '
						</a>
					</li>
					<li>
						<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments331 = array();
// Rendering Array
$array332 = array();
$array332['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'numberOfPages', $renderingContext);
$arguments331['arguments'] = $array332;
$arguments331['action'] = NULL;
$arguments331['section'] = '';
$arguments331['format'] = '';
$arguments331['ajax'] = false;
$arguments331['addQueryStringMethod'] = NULL;
$renderChildrenClosure333 = function() {return NULL;};
$viewHelper334 = $self->getViewHelper('$viewHelper334', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper334->setArguments($arguments331);
$viewHelper334->setRenderingContext($renderingContext);
$viewHelper334->setRenderChildrenClosure($renderChildrenClosure333);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output322 .= $viewHelper334->initializeArgumentsAndRender();

$output322 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments335 = array();
$arguments335['key'] = 'widget.pagination.last';
$arguments335['id'] = NULL;
$arguments335['default'] = NULL;
$arguments335['htmlEscape'] = NULL;
$arguments335['arguments'] = NULL;
$arguments335['extensionName'] = NULL;
$renderChildrenClosure336 = function() {return NULL;};

$output322 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments335, $renderChildrenClosure336, $renderingContext);

$output322 .= '">
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments337 = array();
$arguments337['identifier'] = 'actions-view-paging-last';
$arguments337['size'] = 'small';
$arguments337['overlay'] = NULL;
$arguments337['state'] = 'default';
$arguments337['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure338 = function() {return NULL;};

$output322 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments337, $renderChildrenClosure338, $renderingContext);

$output322 .= '
						</a>
					</li>
				';
return $output322;
};
$arguments293['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output339 = '';

$output339 .= '
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments340 = array();
$arguments340['identifier'] = 'actions-view-paging-next';
$arguments340['size'] = 'small';
$arguments340['overlay'] = NULL;
$arguments340['state'] = 'default';
$arguments340['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure341 = function() {return NULL;};

$output339 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments340, $renderChildrenClosure341, $renderingContext);

$output339 .= '
						</span>
					</li>
					<li class="disabled">
						<span>
							';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments342 = array();
$arguments342['identifier'] = 'actions-view-paging-last';
$arguments342['size'] = 'small';
$arguments342['overlay'] = NULL;
$arguments342['state'] = 'default';
$arguments342['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure343 = function() {return NULL;};

$output339 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments342, $renderChildrenClosure343, $renderingContext);

$output339 .= '
						</span>
					</li>
				';
return $output339;
};

$output185 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments293, $renderChildrenClosure294, $renderingContext);

$output185 .= '
			<li>
				<a href="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper
$arguments344 = array();
// Rendering Array
$array345 = array();
$array345['currentPage'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('pagination'), 'current', $renderingContext);
$arguments344['arguments'] = $array345;
$arguments344['action'] = NULL;
$arguments344['section'] = '';
$arguments344['format'] = '';
$arguments344['ajax'] = false;
$arguments344['addQueryStringMethod'] = NULL;
$renderChildrenClosure346 = function() {return NULL;};
$viewHelper347 = $self->getViewHelper('$viewHelper347', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper');
$viewHelper347->setArguments($arguments344);
$viewHelper347->setRenderingContext($renderingContext);
$viewHelper347->setRenderChildrenClosure($renderChildrenClosure346);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Widget\UriViewHelper

$output185 .= $viewHelper347->initializeArgumentsAndRender();

$output185 .= '" title="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments348 = array();
$arguments348['key'] = 'widget.pagination.refresh';
$arguments348['id'] = NULL;
$arguments348['default'] = NULL;
$arguments348['htmlEscape'] = NULL;
$arguments348['arguments'] = NULL;
$arguments348['extensionName'] = NULL;
$renderChildrenClosure349 = function() {return NULL;};

$output185 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments348, $renderChildrenClosure349, $renderingContext);

$output185 .= '">
					';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments350 = array();
$arguments350['identifier'] = 'actions-refresh';
$arguments350['size'] = 'small';
$arguments350['overlay'] = NULL;
$arguments350['state'] = 'default';
$arguments350['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure351 = function() {return NULL;};

$output185 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments350, $renderChildrenClosure351, $renderingContext);

$output185 .= '
				</a>
			</li>
		</ul>
	</nav>
';
return $output185;
};

$output167 .= '';

$output167 .= '
';


return $output167;
}


}
#1507268210    92196     