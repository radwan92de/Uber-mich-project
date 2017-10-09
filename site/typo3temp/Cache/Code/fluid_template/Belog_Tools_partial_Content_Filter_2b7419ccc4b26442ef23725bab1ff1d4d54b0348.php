<?php
class FluidCache_Belog_Tools_partial_Content_Filter_2b7419ccc4b26442ef23725bab1ff1d4d54b0348 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CommentViewHelper
$arguments1 = array();
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
return '
	This is an ugly workaround.
	The function module in Web->Info already renders a form tag, and there is
	no easy way to circumvent this. The page id is needed for the info module
	that is not extbase based to figure the permissions. Thus, we have to add
	the page Id manually to hint the info module about that.
';
};

$output0 .= '';

$output0 .= '
';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments3 = array();
// Rendering Boolean node
$arguments3['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('constraint'), 'isInPageContext', $renderingContext));
$arguments3['then'] = NULL;
$arguments3['else'] = NULL;
$renderChildrenClosure4 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output5 = '';

$output5 .= '
	<input type="hidden" name="id" value="';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\HtmlspecialcharsViewHelper
$arguments6 = array();
$arguments6['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('constraint'), 'pageId', $renderingContext);
$arguments6['keepQuotes'] = false;
$arguments6['encoding'] = NULL;
$arguments6['doubleEncode'] = true;
$renderChildrenClosure7 = function() {return NULL;};
$value8 = ($arguments6['value'] !== NULL ? $arguments6['value'] : $renderChildrenClosure7());

$output5 .= (!is_string($value8) ? $value8 : htmlspecialchars($value8, ($arguments6['keepQuotes'] ? ENT_NOQUOTES : ENT_COMPAT), ($arguments6['encoding'] !== NULL ? $arguments6['encoding'] : \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate::resolveDefaultEncoding()), $arguments6['doubleEncode']));

$output5 .= '" />
';
return $output5;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments3, $renderChildrenClosure4, $renderingContext);

$output0 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper
$arguments9 = array();
$arguments9['object'] = $currentVariableContainer->getOrNull('constraint');
$arguments9['action'] = 'index';
$arguments9['name'] = 'constraint';
$arguments9['class'] = 'form-inline form-inline-spaced';
$arguments9['additionalAttributes'] = NULL;
$arguments9['data'] = NULL;
$arguments9['arguments'] = array (
);
$arguments9['controller'] = NULL;
$arguments9['extensionName'] = NULL;
$arguments9['pluginName'] = NULL;
$arguments9['pageUid'] = NULL;
$arguments9['pageType'] = 0;
$arguments9['noCache'] = false;
$arguments9['noCacheHash'] = false;
$arguments9['section'] = '';
$arguments9['format'] = '';
$arguments9['additionalParams'] = array (
);
$arguments9['absolute'] = false;
$arguments9['addQueryString'] = false;
$arguments9['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments9['fieldNamePrefix'] = NULL;
$arguments9['actionUri'] = NULL;
$arguments9['objectName'] = NULL;
$arguments9['hiddenFieldClassName'] = NULL;
$arguments9['addQueryStringMethod'] = '';
$arguments9['enctype'] = NULL;
$arguments9['method'] = NULL;
$arguments9['onreset'] = NULL;
$arguments9['onsubmit'] = NULL;
$arguments9['target'] = NULL;
$arguments9['dir'] = NULL;
$arguments9['id'] = NULL;
$arguments9['lang'] = NULL;
$arguments9['style'] = NULL;
$arguments9['title'] = NULL;
$arguments9['accesskey'] = NULL;
$arguments9['tabindex'] = NULL;
$arguments9['onclick'] = NULL;
$renderChildrenClosure10 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output11 = '';

$output11 .= '
	<div class="form-group">
		<label for="belog-users">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments12 = array();
$arguments12['key'] = 'users';
$arguments12['id'] = NULL;
$arguments12['default'] = NULL;
$arguments12['htmlEscape'] = NULL;
$arguments12['arguments'] = NULL;
$arguments12['extensionName'] = NULL;
$renderChildrenClosure13 = function() {return NULL;};

$output11 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments12, $renderChildrenClosure13, $renderingContext);

$output11 .= '</label>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper
$arguments14 = array();
$arguments14['property'] = 'userOrGroup';
$arguments14['options'] = $currentVariableContainer->getOrNull('userGroups');
// Rendering Array
$array15 = array();
$array15['onchange'] = 'submit()';
$arguments14['additionalAttributes'] = $array15;
$arguments14['class'] = 'form-control input-sm';
$arguments14['id'] = 'belog-users';
$arguments14['data'] = NULL;
$arguments14['name'] = NULL;
$arguments14['value'] = NULL;
$arguments14['dir'] = NULL;
$arguments14['lang'] = NULL;
$arguments14['style'] = NULL;
$arguments14['title'] = NULL;
$arguments14['accesskey'] = NULL;
$arguments14['tabindex'] = NULL;
$arguments14['onclick'] = NULL;
$arguments14['size'] = NULL;
$arguments14['disabled'] = NULL;
$arguments14['optionValueField'] = NULL;
$arguments14['optionLabelField'] = NULL;
$arguments14['sortByOptionLabel'] = false;
$arguments14['selectAllByDefault'] = false;
$arguments14['errorClass'] = 'f3-form-error';
$arguments14['prependOptionLabel'] = NULL;
$arguments14['prependOptionValue'] = NULL;
$arguments14['multiple'] = false;
$renderChildrenClosure16 = function() {return NULL;};
$viewHelper17 = $self->getViewHelper('$viewHelper17', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper');
$viewHelper17->setArguments($arguments14);
$viewHelper17->setRenderingContext($renderingContext);
$viewHelper17->setRenderChildrenClosure($renderChildrenClosure16);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper

$output11 .= $viewHelper17->initializeArgumentsAndRender();

$output11 .= '
	</div>

	<div class="form-group">
		<label for="belog-max">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments18 = array();
$arguments18['key'] = 'max';
$arguments18['id'] = NULL;
$arguments18['default'] = NULL;
$arguments18['htmlEscape'] = NULL;
$arguments18['arguments'] = NULL;
$arguments18['extensionName'] = NULL;
$renderChildrenClosure19 = function() {return NULL;};

$output11 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments18, $renderChildrenClosure19, $renderingContext);

$output11 .= '</label>
		';
// Rendering ViewHelper TYPO3\CMS\Belog\ViewHelpers\Form\TranslateLabelSelectViewHelper
$arguments20 = array();
$arguments20['property'] = 'number';
$arguments20['options'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'selectableNumberOfLogEntries', $renderingContext);
$arguments20['optionLabelPrefix'] = 'LLL:EXT:belog/Resources/Private/Language/locallang.xlf:';
// Rendering Array
$array21 = array();
$array21['onchange'] = 'submit()';
$arguments20['additionalAttributes'] = $array21;
$arguments20['class'] = 'form-control input-sm';
$arguments20['id'] = 'belog-max';
$arguments20['data'] = NULL;
$arguments20['name'] = NULL;
$arguments20['value'] = NULL;
$arguments20['dir'] = NULL;
$arguments20['lang'] = NULL;
$arguments20['style'] = NULL;
$arguments20['title'] = NULL;
$arguments20['accesskey'] = NULL;
$arguments20['tabindex'] = NULL;
$arguments20['onclick'] = NULL;
$arguments20['size'] = NULL;
$arguments20['disabled'] = NULL;
$arguments20['optionValueField'] = NULL;
$arguments20['optionLabelField'] = NULL;
$arguments20['sortByOptionLabel'] = false;
$arguments20['selectAllByDefault'] = false;
$arguments20['errorClass'] = 'f3-form-error';
$arguments20['prependOptionLabel'] = NULL;
$arguments20['prependOptionValue'] = NULL;
$arguments20['multiple'] = false;
$renderChildrenClosure22 = function() {return NULL;};
$viewHelper23 = $self->getViewHelper('$viewHelper23', $renderingContext, 'TYPO3\CMS\Belog\ViewHelpers\Form\TranslateLabelSelectViewHelper');
$viewHelper23->setArguments($arguments20);
$viewHelper23->setRenderingContext($renderingContext);
$viewHelper23->setRenderChildrenClosure($renderChildrenClosure22);
// End of ViewHelper TYPO3\CMS\Belog\ViewHelpers\Form\TranslateLabelSelectViewHelper

$output11 .= $viewHelper23->initializeArgumentsAndRender();

$output11 .= '
	</div>

	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments24 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Belog\ViewHelpers\IsExtensionLoadedViewHelper
$arguments25 = array();
$arguments25['extensionKey'] = 'workspaces';
$renderChildrenClosure26 = function() {return NULL;};
$arguments24['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(TYPO3\CMS\Belog\ViewHelpers\IsExtensionLoadedViewHelper::renderStatic($arguments25, $renderChildrenClosure26, $renderingContext));
$arguments24['then'] = NULL;
$arguments24['else'] = NULL;
$renderChildrenClosure27 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output28 = '';

$output28 .= '
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments29 = array();
// Rendering Boolean node
$arguments29['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean($currentVariableContainer->getOrNull('showWorkspaceSelector'));
$arguments29['then'] = NULL;
$arguments29['else'] = NULL;
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output31 = '';

$output31 .= '
				<div class="form-group">
					<label for="belog-workspaces">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments32 = array();
$arguments32['key'] = 'workspace';
$arguments32['id'] = NULL;
$arguments32['default'] = NULL;
$arguments32['htmlEscape'] = NULL;
$arguments32['arguments'] = NULL;
$arguments32['extensionName'] = NULL;
$renderChildrenClosure33 = function() {return NULL;};

$output31 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments32, $renderChildrenClosure33, $renderingContext);

$output31 .= '</label>
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper
$arguments34 = array();
$arguments34['property'] = 'workspaceUid';
$arguments34['options'] = $currentVariableContainer->getOrNull('workspaces');
// Rendering Array
$array35 = array();
$array35['onchange'] = 'submit()';
$arguments34['additionalAttributes'] = $array35;
$arguments34['class'] = 'form-control input-sm';
$arguments34['id'] = 'belog-workspaces';
$arguments34['data'] = NULL;
$arguments34['name'] = NULL;
$arguments34['value'] = NULL;
$arguments34['dir'] = NULL;
$arguments34['lang'] = NULL;
$arguments34['style'] = NULL;
$arguments34['title'] = NULL;
$arguments34['accesskey'] = NULL;
$arguments34['tabindex'] = NULL;
$arguments34['onclick'] = NULL;
$arguments34['size'] = NULL;
$arguments34['disabled'] = NULL;
$arguments34['optionValueField'] = NULL;
$arguments34['optionLabelField'] = NULL;
$arguments34['sortByOptionLabel'] = false;
$arguments34['selectAllByDefault'] = false;
$arguments34['errorClass'] = 'f3-form-error';
$arguments34['prependOptionLabel'] = NULL;
$arguments34['prependOptionValue'] = NULL;
$arguments34['multiple'] = false;
$renderChildrenClosure36 = function() {return NULL;};
$viewHelper37 = $self->getViewHelper('$viewHelper37', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper');
$viewHelper37->setArguments($arguments34);
$viewHelper37->setRenderingContext($renderingContext);
$viewHelper37->setRenderChildrenClosure($renderChildrenClosure36);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper

$output31 .= $viewHelper37->initializeArgumentsAndRender();

$output31 .= '
				</div>
		';
return $output31;
};

$output28 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments29, $renderChildrenClosure30, $renderingContext);

$output28 .= '
	';
return $output28;
};

$output11 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments24, $renderChildrenClosure27, $renderingContext);

$output11 .= '

	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments38 = array();
// Rendering Boolean node
$arguments38['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('constraint'), 'isInPageContext', $renderingContext));
$arguments38['then'] = NULL;
$arguments38['else'] = NULL;
$renderChildrenClosure39 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output40 = '';

$output40 .= '
		<div class="form-group">
			<label for="belog-depth">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments41 = array();
$arguments41['key'] = 'chLog_menuDepth';
$arguments41['id'] = NULL;
$arguments41['default'] = NULL;
$arguments41['htmlEscape'] = NULL;
$arguments41['arguments'] = NULL;
$arguments41['extensionName'] = NULL;
$renderChildrenClosure42 = function() {return NULL;};

$output40 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments41, $renderChildrenClosure42, $renderingContext);

$output40 .= '</label>
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper
$arguments43 = array();
$arguments43['property'] = 'depth';
$arguments43['options'] = $currentVariableContainer->getOrNull('pageDepths');
// Rendering Array
$array44 = array();
$array44['onchange'] = 'submit()';
$arguments43['additionalAttributes'] = $array44;
$arguments43['class'] = 'form-control input-sm';
$arguments43['id'] = 'belog-depth';
$arguments43['data'] = NULL;
$arguments43['name'] = NULL;
$arguments43['value'] = NULL;
$arguments43['dir'] = NULL;
$arguments43['lang'] = NULL;
$arguments43['style'] = NULL;
$arguments43['title'] = NULL;
$arguments43['accesskey'] = NULL;
$arguments43['tabindex'] = NULL;
$arguments43['onclick'] = NULL;
$arguments43['size'] = NULL;
$arguments43['disabled'] = NULL;
$arguments43['optionValueField'] = NULL;
$arguments43['optionLabelField'] = NULL;
$arguments43['sortByOptionLabel'] = false;
$arguments43['selectAllByDefault'] = false;
$arguments43['errorClass'] = 'f3-form-error';
$arguments43['prependOptionLabel'] = NULL;
$arguments43['prependOptionValue'] = NULL;
$arguments43['multiple'] = false;
$renderChildrenClosure45 = function() {return NULL;};
$viewHelper46 = $self->getViewHelper('$viewHelper46', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper');
$viewHelper46->setArguments($arguments43);
$viewHelper46->setRenderingContext($renderingContext);
$viewHelper46->setRenderChildrenClosure($renderChildrenClosure45);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SelectViewHelper

$output40 .= $viewHelper46->initializeArgumentsAndRender();

$output40 .= '
		</div>
	';
return $output40;
};

$output11 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments38, $renderChildrenClosure39, $renderingContext);

$output11 .= '

	<div class="form-group">
		<label for="belog-time">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments47 = array();
$arguments47['key'] = 'time';
$arguments47['id'] = NULL;
$arguments47['default'] = NULL;
$arguments47['htmlEscape'] = NULL;
$arguments47['arguments'] = NULL;
$arguments47['extensionName'] = NULL;
$renderChildrenClosure48 = function() {return NULL;};

$output11 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments47, $renderChildrenClosure48, $renderingContext);

$output11 .= '</label>
		';
// Rendering ViewHelper TYPO3\CMS\Belog\ViewHelpers\Form\TranslateLabelSelectViewHelper
$arguments49 = array();
$arguments49['property'] = 'timeFrame';
$arguments49['options'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'selectableTimeFrames', $renderingContext);
$arguments49['optionLabelPrefix'] = 'LLL:EXT:belog/Resources/Private/Language/locallang.xlf:';
// Rendering Array
$array50 = array();
$array50['onchange'] = 'submit()';
$arguments49['additionalAttributes'] = $array50;
$arguments49['class'] = 'form-control input-sm';
$arguments49['id'] = 'belog-time';
$arguments49['data'] = NULL;
$arguments49['name'] = NULL;
$arguments49['value'] = NULL;
$arguments49['dir'] = NULL;
$arguments49['lang'] = NULL;
$arguments49['style'] = NULL;
$arguments49['title'] = NULL;
$arguments49['accesskey'] = NULL;
$arguments49['tabindex'] = NULL;
$arguments49['onclick'] = NULL;
$arguments49['size'] = NULL;
$arguments49['disabled'] = NULL;
$arguments49['optionValueField'] = NULL;
$arguments49['optionLabelField'] = NULL;
$arguments49['sortByOptionLabel'] = false;
$arguments49['selectAllByDefault'] = false;
$arguments49['errorClass'] = 'f3-form-error';
$arguments49['prependOptionLabel'] = NULL;
$arguments49['prependOptionValue'] = NULL;
$arguments49['multiple'] = false;
$renderChildrenClosure51 = function() {return NULL;};
$viewHelper52 = $self->getViewHelper('$viewHelper52', $renderingContext, 'TYPO3\CMS\Belog\ViewHelpers\Form\TranslateLabelSelectViewHelper');
$viewHelper52->setArguments($arguments49);
$viewHelper52->setRenderingContext($renderingContext);
$viewHelper52->setRenderChildrenClosure($renderChildrenClosure51);
// End of ViewHelper TYPO3\CMS\Belog\ViewHelpers\Form\TranslateLabelSelectViewHelper

$output11 .= $viewHelper52->initializeArgumentsAndRender();

$output11 .= '
	</div>

	<div class="form-group">
		<label for="belog-action">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments53 = array();
$arguments53['key'] = 'action';
$arguments53['id'] = NULL;
$arguments53['default'] = NULL;
$arguments53['htmlEscape'] = NULL;
$arguments53['arguments'] = NULL;
$arguments53['extensionName'] = NULL;
$renderChildrenClosure54 = function() {return NULL;};

$output11 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments53, $renderChildrenClosure54, $renderingContext);

$output11 .= '</label>
		';
// Rendering ViewHelper TYPO3\CMS\Belog\ViewHelpers\Form\TranslateLabelSelectViewHelper
$arguments55 = array();
$arguments55['property'] = 'action';
$arguments55['options'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'selectableActions', $renderingContext);
$arguments55['optionLabelPrefix'] = 'LLL:EXT:belog/Resources/Private/Language/locallang.xlf:';
// Rendering Array
$array56 = array();
$array56['onchange'] = 'submit()';
$arguments55['additionalAttributes'] = $array56;
$arguments55['class'] = 'form-control input-sm';
$arguments55['id'] = 'belog-action';
$arguments55['data'] = NULL;
$arguments55['name'] = NULL;
$arguments55['value'] = NULL;
$arguments55['dir'] = NULL;
$arguments55['lang'] = NULL;
$arguments55['style'] = NULL;
$arguments55['title'] = NULL;
$arguments55['accesskey'] = NULL;
$arguments55['tabindex'] = NULL;
$arguments55['onclick'] = NULL;
$arguments55['size'] = NULL;
$arguments55['disabled'] = NULL;
$arguments55['optionValueField'] = NULL;
$arguments55['optionLabelField'] = NULL;
$arguments55['sortByOptionLabel'] = false;
$arguments55['selectAllByDefault'] = false;
$arguments55['errorClass'] = 'f3-form-error';
$arguments55['prependOptionLabel'] = NULL;
$arguments55['prependOptionValue'] = NULL;
$arguments55['multiple'] = false;
$renderChildrenClosure57 = function() {return NULL;};
$viewHelper58 = $self->getViewHelper('$viewHelper58', $renderingContext, 'TYPO3\CMS\Belog\ViewHelpers\Form\TranslateLabelSelectViewHelper');
$viewHelper58->setArguments($arguments55);
$viewHelper58->setRenderingContext($renderingContext);
$viewHelper58->setRenderChildrenClosure($renderChildrenClosure57);
// End of ViewHelper TYPO3\CMS\Belog\ViewHelpers\Form\TranslateLabelSelectViewHelper

$output11 .= $viewHelper58->initializeArgumentsAndRender();

$output11 .= '
	</div>

	<div class="form-group">
		<label for="belog-group">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments59 = array();
$arguments59['key'] = 'groupByPage';
$arguments59['id'] = NULL;
$arguments59['default'] = NULL;
$arguments59['htmlEscape'] = NULL;
$arguments59['arguments'] = NULL;
$arguments59['extensionName'] = NULL;
$renderChildrenClosure60 = function() {return NULL;};

$output11 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments59, $renderChildrenClosure60, $renderingContext);

$output11 .= '</label>
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\CheckboxViewHelper
$arguments61 = array();
$arguments61['property'] = 'groupByPage';
$arguments61['value'] = '1';
// Rendering Array
$array62 = array();
$array62['onchange'] = 'submit()';
$arguments61['additionalAttributes'] = $array62;
$arguments61['id'] = 'belog-group';
$arguments61['data'] = NULL;
$arguments61['checked'] = NULL;
$arguments61['multiple'] = false;
$arguments61['name'] = NULL;
$arguments61['disabled'] = NULL;
$arguments61['errorClass'] = 'f3-form-error';
$arguments61['class'] = NULL;
$arguments61['dir'] = NULL;
$arguments61['lang'] = NULL;
$arguments61['style'] = NULL;
$arguments61['title'] = NULL;
$arguments61['accesskey'] = NULL;
$arguments61['tabindex'] = NULL;
$arguments61['onclick'] = NULL;
$renderChildrenClosure63 = function() {return NULL;};
$viewHelper64 = $self->getViewHelper('$viewHelper64', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\CheckboxViewHelper');
$viewHelper64->setArguments($arguments61);
$viewHelper64->setRenderingContext($renderingContext);
$viewHelper64->setRenderChildrenClosure($renderChildrenClosure63);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\CheckboxViewHelper

$output11 .= $viewHelper64->initializeArgumentsAndRender();

$output11 .= '
	</div>

	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CommentViewHelper
$arguments65 = array();
$renderChildrenClosure66 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
return '
		Date time fields for manual date selection
	';
};

$output11 .= '';

$output11 .= '


	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments67 = array();
// Rendering Boolean node
$arguments67['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('==', \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('constraint'), 'timeFrame', $renderingContext), 30);
$arguments67['then'] = NULL;
$arguments67['else'] = NULL;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output69 = '';

$output69 .= '
		<div class="form-group">
			<label for="manualDateStart">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments70 = array();
$arguments70['key'] = 'LLL:EXT:lang/locallang_common.xlf:from';
$arguments70['id'] = NULL;
$arguments70['default'] = NULL;
$arguments70['htmlEscape'] = NULL;
$arguments70['arguments'] = NULL;
$arguments70['extensionName'] = NULL;
$renderChildrenClosure71 = function() {return NULL;};

$output69 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments70, $renderChildrenClosure71, $renderingContext);

$output69 .= '</label>
			<div class="input-group input-group-sm">
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments72 = array();
$arguments72['name'] = 'manualDateStart';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments73 = array();
// Rendering Boolean node
$arguments73['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean(\TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('constraint'), 'startTimestamp', $renderingContext));
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments74 = array();
$output75 = '';

$output75 .= \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'timeFormat', $renderingContext);

$output75 .= ' ';

$output75 .= \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'dateFormat', $renderingContext);
$arguments74['format'] = $output75;
$output76 = '';

$output76 .= '@';

$output76 .= \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('constraint'), 'startTimestamp', $renderingContext);
$arguments74['date'] = $output76;
$arguments74['base'] = NULL;
$renderChildrenClosure77 = function() {return NULL;};
$arguments73['then'] = TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments74, $renderChildrenClosure77, $renderingContext);
$arguments73['else'] = NULL;
$renderChildrenClosure78 = function() {return NULL;};
$arguments72['value'] = TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments73, $renderChildrenClosure78, $renderingContext);
$arguments72['id'] = 'manualDateStart';
$arguments72['class'] = 'form-control input-sm t3js-datetimepicker t3js-clearable';
// Rendering Array
$array79 = array();
$array79['date-type'] = 'datetime';
$array79['date-offset'] = 0;
$arguments72['data'] = $array79;
$arguments72['additionalAttributes'] = NULL;
$arguments72['required'] = false;
$arguments72['type'] = 'text';
$arguments72['property'] = NULL;
$arguments72['autofocus'] = NULL;
$arguments72['disabled'] = NULL;
$arguments72['maxlength'] = NULL;
$arguments72['readonly'] = NULL;
$arguments72['size'] = NULL;
$arguments72['placeholder'] = NULL;
$arguments72['pattern'] = NULL;
$arguments72['errorClass'] = 'f3-form-error';
$arguments72['dir'] = NULL;
$arguments72['lang'] = NULL;
$arguments72['style'] = NULL;
$arguments72['title'] = NULL;
$arguments72['accesskey'] = NULL;
$arguments72['tabindex'] = NULL;
$arguments72['onclick'] = NULL;
$renderChildrenClosure80 = function() {return NULL;};
$viewHelper81 = $self->getViewHelper('$viewHelper81', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper81->setArguments($arguments72);
$viewHelper81->setRenderingContext($renderingContext);
$viewHelper81->setRenderChildrenClosure($renderChildrenClosure80);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output69 .= $viewHelper81->initializeArgumentsAndRender();

$output69 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments82 = array();
$arguments82['property'] = 'startTimestamp';
$arguments82['value'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('constraint'), 'startTimestamp', $renderingContext);
$arguments82['additionalAttributes'] = NULL;
$arguments82['data'] = NULL;
$arguments82['name'] = NULL;
$arguments82['class'] = NULL;
$arguments82['dir'] = NULL;
$arguments82['id'] = NULL;
$arguments82['lang'] = NULL;
$arguments82['style'] = NULL;
$arguments82['title'] = NULL;
$arguments82['accesskey'] = NULL;
$arguments82['tabindex'] = NULL;
$arguments82['onclick'] = NULL;
$renderChildrenClosure83 = function() {return NULL;};
$viewHelper84 = $self->getViewHelper('$viewHelper84', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper84->setArguments($arguments82);
$viewHelper84->setRenderingContext($renderingContext);
$viewHelper84->setRenderChildrenClosure($renderChildrenClosure83);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\HiddenViewHelper

$output69 .= $viewHelper84->initializeArgumentsAndRender();

$output69 .= '
				<span class="input-group-btn">
					<label class="btn btn-default" for="manualDateStart">
						<span class="fa fa-calendar"></span>
					</label>
				</span>
			</div>

		</div>

		<div class="form-group">
			<label for="manualDateStop">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments85 = array();
$arguments85['key'] = 'LLL:EXT:lang/locallang_common.xlf:to';
$arguments85['id'] = NULL;
$arguments85['default'] = NULL;
$arguments85['htmlEscape'] = NULL;
$arguments85['arguments'] = NULL;
$arguments85['extensionName'] = NULL;
$renderChildrenClosure86 = function() {return NULL;};

$output69 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments85, $renderChildrenClosure86, $renderingContext);

$output69 .= '</label>
			<div class="input-group input-group-sm">
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments87 = array();
$arguments87['name'] = 'manualDateStop';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper
$arguments88 = array();
$output89 = '';

$output89 .= \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'timeFormat', $renderingContext);

$output89 .= ' ';

$output89 .= \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('settings'), 'dateFormat', $renderingContext);
$arguments88['format'] = $output89;
$output90 = '';

$output90 .= '@';

$output90 .= \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('constraint'), 'endTimestamp', $renderingContext);
$arguments88['date'] = $output90;
$arguments88['base'] = NULL;
$renderChildrenClosure91 = function() {return NULL;};
$arguments87['value'] = TYPO3\CMS\Fluid\ViewHelpers\Format\DateViewHelper::renderStatic($arguments88, $renderChildrenClosure91, $renderingContext);
$arguments87['id'] = 'manualDateStop';
$arguments87['class'] = 'form-control input-sm t3js-datetimepicker t3js-clearable';
// Rendering Array
$array92 = array();
$array92['date-type'] = 'datetime';
$array92['date-offset'] = 0;
$arguments87['data'] = $array92;
$arguments87['additionalAttributes'] = NULL;
$arguments87['required'] = false;
$arguments87['type'] = 'text';
$arguments87['property'] = NULL;
$arguments87['autofocus'] = NULL;
$arguments87['disabled'] = NULL;
$arguments87['maxlength'] = NULL;
$arguments87['readonly'] = NULL;
$arguments87['size'] = NULL;
$arguments87['placeholder'] = NULL;
$arguments87['pattern'] = NULL;
$arguments87['errorClass'] = 'f3-form-error';
$arguments87['dir'] = NULL;
$arguments87['lang'] = NULL;
$arguments87['style'] = NULL;
$arguments87['title'] = NULL;
$arguments87['accesskey'] = NULL;
$arguments87['tabindex'] = NULL;
$arguments87['onclick'] = NULL;
$renderChildrenClosure93 = function() {return NULL;};
$viewHelper94 = $self->getViewHelper('$viewHelper94', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper94->setArguments($arguments87);
$viewHelper94->setRenderingContext($renderingContext);
$viewHelper94->setRenderChildrenClosure($renderChildrenClosure93);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output69 .= $viewHelper94->initializeArgumentsAndRender();

$output69 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\HiddenViewHelper
$arguments95 = array();
$arguments95['property'] = 'endTimestamp';
$arguments95['additionalAttributes'] = NULL;
$arguments95['data'] = NULL;
$arguments95['name'] = NULL;
$arguments95['value'] = NULL;
$arguments95['class'] = NULL;
$arguments95['dir'] = NULL;
$arguments95['id'] = NULL;
$arguments95['lang'] = NULL;
$arguments95['style'] = NULL;
$arguments95['title'] = NULL;
$arguments95['accesskey'] = NULL;
$arguments95['tabindex'] = NULL;
$arguments95['onclick'] = NULL;
$renderChildrenClosure96 = function() {return NULL;};
$viewHelper97 = $self->getViewHelper('$viewHelper97', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\HiddenViewHelper');
$viewHelper97->setArguments($arguments95);
$viewHelper97->setRenderingContext($renderingContext);
$viewHelper97->setRenderChildrenClosure($renderChildrenClosure96);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\HiddenViewHelper

$output69 .= $viewHelper97->initializeArgumentsAndRender();

$output69 .= '
				<span class="input-group-btn">
					<label class="btn btn-default" for="manualDateStop">
						<span class="fa fa-calendar"></span>
					</label>
				</span>
			</div>
		</div>
	';
return $output69;
};

$output11 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments67, $renderChildrenClosure68, $renderingContext);

$output11 .= '

	<div class="form-group">
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments98 = array();
$arguments98['id'] = 'submit-constraint';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments99 = array();
$arguments99['key'] = 'set';
$arguments99['id'] = NULL;
$arguments99['default'] = NULL;
$arguments99['htmlEscape'] = NULL;
$arguments99['arguments'] = NULL;
$arguments99['extensionName'] = NULL;
$renderChildrenClosure100 = function() {return NULL;};
$arguments98['value'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments99, $renderChildrenClosure100, $renderingContext);
$arguments98['class'] = 'btn btn-default btn-sm';
$arguments98['additionalAttributes'] = NULL;
$arguments98['data'] = NULL;
$arguments98['name'] = NULL;
$arguments98['property'] = NULL;
$arguments98['disabled'] = NULL;
$arguments98['dir'] = NULL;
$arguments98['lang'] = NULL;
$arguments98['style'] = NULL;
$arguments98['title'] = NULL;
$arguments98['accesskey'] = NULL;
$arguments98['tabindex'] = NULL;
$arguments98['onclick'] = NULL;
$renderChildrenClosure101 = function() {return NULL;};
$viewHelper102 = $self->getViewHelper('$viewHelper102', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper102->setArguments($arguments98);
$viewHelper102->setRenderingContext($renderingContext);
$viewHelper102->setRenderChildrenClosure($renderChildrenClosure101);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper

$output11 .= $viewHelper102->initializeArgumentsAndRender();

$output11 .= '
	</div>
';
return $output11;
};
$viewHelper103 = $self->getViewHelper('$viewHelper103', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper');
$viewHelper103->setArguments($arguments9);
$viewHelper103->setRenderingContext($renderingContext);
$viewHelper103->setRenderChildrenClosure($renderChildrenClosure10);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper

$output0 .= $viewHelper103->initializeArgumentsAndRender();

$output0 .= '
';


return $output0;
}


}
#1507374216    35865     