<?php
class FluidCache_Extensionmanager_List_action_ter_23de1f232106f452ac6d7db0bb3f76e98079e47d extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
$arguments1['key'] = 'getExtensions';
$arguments1['id'] = NULL;
$arguments1['default'] = NULL;
$arguments1['htmlEscape'] = NULL;
$arguments1['arguments'] = NULL;
$arguments1['extensionName'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
return 'Get Extensions';
};

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

	<div class="row">
		<div class="col-sm-6">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper
$arguments6 = array();
$arguments6['class'] = 'typo3-extensionmanager-searchTerForm form-inline';
$arguments6['action'] = 'ter';
$arguments6['additionalAttributes'] = NULL;
$arguments6['data'] = NULL;
$arguments6['arguments'] = array (
);
$arguments6['controller'] = NULL;
$arguments6['extensionName'] = NULL;
$arguments6['pluginName'] = NULL;
$arguments6['pageUid'] = NULL;
$arguments6['object'] = NULL;
$arguments6['pageType'] = 0;
$arguments6['noCache'] = false;
$arguments6['noCacheHash'] = false;
$arguments6['section'] = '';
$arguments6['format'] = '';
$arguments6['additionalParams'] = array (
);
$arguments6['absolute'] = false;
$arguments6['addQueryString'] = false;
$arguments6['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments6['fieldNamePrefix'] = NULL;
$arguments6['actionUri'] = NULL;
$arguments6['objectName'] = NULL;
$arguments6['hiddenFieldClassName'] = NULL;
$arguments6['addQueryStringMethod'] = '';
$arguments6['enctype'] = NULL;
$arguments6['method'] = NULL;
$arguments6['name'] = NULL;
$arguments6['onreset'] = NULL;
$arguments6['onsubmit'] = NULL;
$arguments6['target'] = NULL;
$arguments6['dir'] = NULL;
$arguments6['id'] = NULL;
$arguments6['lang'] = NULL;
$arguments6['style'] = NULL;
$arguments6['title'] = NULL;
$arguments6['accesskey'] = NULL;
$arguments6['tabindex'] = NULL;
$arguments6['onclick'] = NULL;
$renderChildrenClosure7 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output8 = '';

$output8 .= '
				<div class="input-group">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments9 = array();
$arguments9['name'] = 'search';
$arguments9['value'] = $currentVariableContainer->getOrNull('search');
$arguments9['class'] = 'form-control';
$arguments9['additionalAttributes'] = NULL;
$arguments9['data'] = NULL;
$arguments9['required'] = false;
$arguments9['type'] = 'text';
$arguments9['property'] = NULL;
$arguments9['autofocus'] = NULL;
$arguments9['disabled'] = NULL;
$arguments9['maxlength'] = NULL;
$arguments9['readonly'] = NULL;
$arguments9['size'] = NULL;
$arguments9['placeholder'] = NULL;
$arguments9['pattern'] = NULL;
$arguments9['errorClass'] = 'f3-form-error';
$arguments9['dir'] = NULL;
$arguments9['id'] = NULL;
$arguments9['lang'] = NULL;
$arguments9['style'] = NULL;
$arguments9['title'] = NULL;
$arguments9['accesskey'] = NULL;
$arguments9['tabindex'] = NULL;
$arguments9['onclick'] = NULL;
$renderChildrenClosure10 = function() {return NULL;};
$viewHelper11 = $self->getViewHelper('$viewHelper11', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper11->setArguments($arguments9);
$viewHelper11->setRenderingContext($renderingContext);
$viewHelper11->setRenderChildrenClosure($renderChildrenClosure10);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output8 .= $viewHelper11->initializeArgumentsAndRender();

$output8 .= '
					<span class="input-group-btn">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments12 = array();
$arguments12['class'] = 'btn btn-default';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments13 = array();
$arguments13['key'] = 'searchTemplate.submitButton';
$arguments13['id'] = NULL;
$arguments13['default'] = NULL;
$arguments13['htmlEscape'] = NULL;
$arguments13['arguments'] = NULL;
$arguments13['extensionName'] = NULL;
$renderChildrenClosure14 = function() {return NULL;};
$arguments12['value'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments13, $renderChildrenClosure14, $renderingContext);
$arguments12['additionalAttributes'] = NULL;
$arguments12['data'] = NULL;
$arguments12['name'] = NULL;
$arguments12['property'] = NULL;
$arguments12['disabled'] = NULL;
$arguments12['dir'] = NULL;
$arguments12['id'] = NULL;
$arguments12['lang'] = NULL;
$arguments12['style'] = NULL;
$arguments12['title'] = NULL;
$arguments12['accesskey'] = NULL;
$arguments12['tabindex'] = NULL;
$arguments12['onclick'] = NULL;
$renderChildrenClosure15 = function() {return NULL;};
$viewHelper16 = $self->getViewHelper('$viewHelper16', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper16->setArguments($arguments12);
$viewHelper16->setRenderingContext($renderingContext);
$viewHelper16->setRenderChildrenClosure($renderChildrenClosure15);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper

$output8 .= $viewHelper16->initializeArgumentsAndRender();

$output8 .= '
					</span>
				</div>
			';
return $output8;
};
$viewHelper17 = $self->getViewHelper('$viewHelper17', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper');
$viewHelper17->setArguments($arguments6);
$viewHelper17->setRenderingContext($renderingContext);
$viewHelper17->setRenderChildrenClosure($renderChildrenClosure7);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper

$output3 .= $viewHelper17->initializeArgumentsAndRender();

$output3 .= '
		</div>
		<div class="col-sm-6">
			<div class="pull-right">
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments18 = array();
$arguments18['partial'] = 'List/UpdateFromTer';
$arguments18['section'] = NULL;
$arguments18['arguments'] = array (
);
$arguments18['optional'] = false;
$renderChildrenClosure19 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments18, $renderChildrenClosure19, $renderingContext);

$output3 .= '
			</div>
		</div>
	</div>

	<div id="terTableWrapper">
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments20 = array();
// Rendering Boolean node
$arguments20['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean($currentVariableContainer->getOrNull('search'));
$arguments20['then'] = NULL;
$arguments20['else'] = NULL;
$renderChildrenClosure21 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output22 = '';

$output22 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments23 = array();
$renderChildrenClosure24 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output25 = '';

$output25 .= '
				<table id="terSearchTable" class="table table-striped table-hover typo3-extension-list">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments26 = array();
$arguments26['partial'] = 'List/TerTable';
// Rendering Array
$array27 = array();
$array27['paginatedExtensions'] = $currentVariableContainer->getOrNull('extensions');
$array27['availableAndInstalled'] = $currentVariableContainer->getOrNull('availableAndInstalled');
$arguments26['arguments'] = $array27;
$arguments26['section'] = NULL;
$arguments26['optional'] = false;
$renderChildrenClosure28 = function() {return NULL;};

$output25 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments26, $renderChildrenClosure28, $renderingContext);

$output25 .= '
				</table>
			';
return $output25;
};

$output22 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments23, $renderChildrenClosure24, $renderingContext);

$output22 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments29 = array();
$renderChildrenClosure30 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output31 = '';

$output31 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments32 = array();
$arguments32['partial'] = 'List/TerPaginator';
// Rendering Array
$array33 = array();
$array33['extensions'] = $currentVariableContainer->getOrNull('extensions');
$array33['showVersionList'] = $currentVariableContainer->getOrNull('showVersionList');
$array33['availableAndInstalled'] = $currentVariableContainer->getOrNull('availableAndInstalled');
$arguments32['arguments'] = $array33;
$arguments32['section'] = NULL;
$arguments32['optional'] = false;
$renderChildrenClosure34 = function() {return NULL;};

$output31 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments32, $renderChildrenClosure34, $renderingContext);

$output31 .= '
			';
return $output31;
};

$output22 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments29, $renderChildrenClosure30, $renderingContext);

$output22 .= '
		';
return $output22;
};
$arguments20['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output35 = '';

$output35 .= '
				<table id="terSearchTable" class="table table-striped table-hover typo3-extension-list">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments36 = array();
$arguments36['partial'] = 'List/TerTable';
// Rendering Array
$array37 = array();
$array37['paginatedExtensions'] = $currentVariableContainer->getOrNull('extensions');
$array37['availableAndInstalled'] = $currentVariableContainer->getOrNull('availableAndInstalled');
$arguments36['arguments'] = $array37;
$arguments36['section'] = NULL;
$arguments36['optional'] = false;
$renderChildrenClosure38 = function() {return NULL;};

$output35 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments36, $renderChildrenClosure38, $renderingContext);

$output35 .= '
				</table>
			';
return $output35;
};
$arguments20['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output39 = '';

$output39 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments40 = array();
$arguments40['partial'] = 'List/TerPaginator';
// Rendering Array
$array41 = array();
$array41['extensions'] = $currentVariableContainer->getOrNull('extensions');
$array41['showVersionList'] = $currentVariableContainer->getOrNull('showVersionList');
$array41['availableAndInstalled'] = $currentVariableContainer->getOrNull('availableAndInstalled');
$arguments40['arguments'] = $array41;
$arguments40['section'] = NULL;
$arguments40['optional'] = false;
$renderChildrenClosure42 = function() {return NULL;};

$output39 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments40, $renderChildrenClosure42, $renderingContext);

$output39 .= '
			';
return $output39;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments20, $renderChildrenClosure21, $renderingContext);

$output3 .= '
		<div class="splash-receivedata x-mask-loading">';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments43 = array();
$arguments43['identifier'] = 'spinner-circle-dark';
$arguments43['size'] = 'small';
$arguments43['overlay'] = NULL;
$arguments43['state'] = 'default';
$arguments43['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure44 = function() {return NULL;};

$output3 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments43, $renderChildrenClosure44, $renderingContext);

$output3 .= ' ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments45 = array();
$arguments45['key'] = 'extensionList.updateFromTer.label';
$arguments45['id'] = NULL;
$arguments45['default'] = NULL;
$arguments45['htmlEscape'] = NULL;
$arguments45['arguments'] = NULL;
$arguments45['extensionName'] = NULL;
$renderChildrenClosure46 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments45, $renderChildrenClosure46, $renderingContext);

$output3 .= '</div>
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

$output47 = '';

$output47 .= '


';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper
$arguments48 = array();
$arguments48['name'] = 'main';
$renderChildrenClosure49 = function() {return NULL;};
$viewHelper50 = $self->getViewHelper('$viewHelper50', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper');
$viewHelper50->setArguments($arguments48);
$viewHelper50->setRenderingContext($renderingContext);
$viewHelper50->setRenderChildrenClosure($renderChildrenClosure49);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\LayoutViewHelper

$output47 .= $viewHelper50->initializeArgumentsAndRender();

$output47 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments51 = array();
$arguments51['name'] = 'headline';
$renderChildrenClosure52 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output53 = '';

$output53 .= '
	<h1>';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments54 = array();
$arguments54['key'] = 'getExtensions';
$arguments54['id'] = NULL;
$arguments54['default'] = NULL;
$arguments54['htmlEscape'] = NULL;
$arguments54['arguments'] = NULL;
$arguments54['extensionName'] = NULL;
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
return 'Get Extensions';
};

$output53 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments54, $renderChildrenClosure55, $renderingContext);

$output53 .= '</h1>
';
return $output53;
};

$output47 .= '';

$output47 .= '

';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SectionViewHelper
$arguments56 = array();
$arguments56['name'] = 'content';
$renderChildrenClosure57 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output58 = '';

$output58 .= '
	';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments59 = array();
$arguments59['partial'] = 'List/UploadForm';
$arguments59['section'] = NULL;
$arguments59['arguments'] = array (
);
$arguments59['optional'] = false;
$renderChildrenClosure60 = function() {return NULL;};

$output58 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments59, $renderChildrenClosure60, $renderingContext);

$output58 .= '

	<div class="row">
		<div class="col-sm-6">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper
$arguments61 = array();
$arguments61['class'] = 'typo3-extensionmanager-searchTerForm form-inline';
$arguments61['action'] = 'ter';
$arguments61['additionalAttributes'] = NULL;
$arguments61['data'] = NULL;
$arguments61['arguments'] = array (
);
$arguments61['controller'] = NULL;
$arguments61['extensionName'] = NULL;
$arguments61['pluginName'] = NULL;
$arguments61['pageUid'] = NULL;
$arguments61['object'] = NULL;
$arguments61['pageType'] = 0;
$arguments61['noCache'] = false;
$arguments61['noCacheHash'] = false;
$arguments61['section'] = '';
$arguments61['format'] = '';
$arguments61['additionalParams'] = array (
);
$arguments61['absolute'] = false;
$arguments61['addQueryString'] = false;
$arguments61['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments61['fieldNamePrefix'] = NULL;
$arguments61['actionUri'] = NULL;
$arguments61['objectName'] = NULL;
$arguments61['hiddenFieldClassName'] = NULL;
$arguments61['addQueryStringMethod'] = '';
$arguments61['enctype'] = NULL;
$arguments61['method'] = NULL;
$arguments61['name'] = NULL;
$arguments61['onreset'] = NULL;
$arguments61['onsubmit'] = NULL;
$arguments61['target'] = NULL;
$arguments61['dir'] = NULL;
$arguments61['id'] = NULL;
$arguments61['lang'] = NULL;
$arguments61['style'] = NULL;
$arguments61['title'] = NULL;
$arguments61['accesskey'] = NULL;
$arguments61['tabindex'] = NULL;
$arguments61['onclick'] = NULL;
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output63 = '';

$output63 .= '
				<div class="input-group">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
$arguments64 = array();
$arguments64['name'] = 'search';
$arguments64['value'] = $currentVariableContainer->getOrNull('search');
$arguments64['class'] = 'form-control';
$arguments64['additionalAttributes'] = NULL;
$arguments64['data'] = NULL;
$arguments64['required'] = false;
$arguments64['type'] = 'text';
$arguments64['property'] = NULL;
$arguments64['autofocus'] = NULL;
$arguments64['disabled'] = NULL;
$arguments64['maxlength'] = NULL;
$arguments64['readonly'] = NULL;
$arguments64['size'] = NULL;
$arguments64['placeholder'] = NULL;
$arguments64['pattern'] = NULL;
$arguments64['errorClass'] = 'f3-form-error';
$arguments64['dir'] = NULL;
$arguments64['id'] = NULL;
$arguments64['lang'] = NULL;
$arguments64['style'] = NULL;
$arguments64['title'] = NULL;
$arguments64['accesskey'] = NULL;
$arguments64['tabindex'] = NULL;
$arguments64['onclick'] = NULL;
$renderChildrenClosure65 = function() {return NULL;};
$viewHelper66 = $self->getViewHelper('$viewHelper66', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper');
$viewHelper66->setArguments($arguments64);
$viewHelper66->setRenderingContext($renderingContext);
$viewHelper66->setRenderChildrenClosure($renderChildrenClosure65);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper

$output63 .= $viewHelper66->initializeArgumentsAndRender();

$output63 .= '
					<span class="input-group-btn">
						';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments67 = array();
$arguments67['class'] = 'btn btn-default';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments68 = array();
$arguments68['key'] = 'searchTemplate.submitButton';
$arguments68['id'] = NULL;
$arguments68['default'] = NULL;
$arguments68['htmlEscape'] = NULL;
$arguments68['arguments'] = NULL;
$arguments68['extensionName'] = NULL;
$renderChildrenClosure69 = function() {return NULL;};
$arguments67['value'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments68, $renderChildrenClosure69, $renderingContext);
$arguments67['additionalAttributes'] = NULL;
$arguments67['data'] = NULL;
$arguments67['name'] = NULL;
$arguments67['property'] = NULL;
$arguments67['disabled'] = NULL;
$arguments67['dir'] = NULL;
$arguments67['id'] = NULL;
$arguments67['lang'] = NULL;
$arguments67['style'] = NULL;
$arguments67['title'] = NULL;
$arguments67['accesskey'] = NULL;
$arguments67['tabindex'] = NULL;
$arguments67['onclick'] = NULL;
$renderChildrenClosure70 = function() {return NULL;};
$viewHelper71 = $self->getViewHelper('$viewHelper71', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper71->setArguments($arguments67);
$viewHelper71->setRenderingContext($renderingContext);
$viewHelper71->setRenderChildrenClosure($renderChildrenClosure70);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper

$output63 .= $viewHelper71->initializeArgumentsAndRender();

$output63 .= '
					</span>
				</div>
			';
return $output63;
};
$viewHelper72 = $self->getViewHelper('$viewHelper72', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper');
$viewHelper72->setArguments($arguments61);
$viewHelper72->setRenderingContext($renderingContext);
$viewHelper72->setRenderChildrenClosure($renderChildrenClosure62);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper

$output58 .= $viewHelper72->initializeArgumentsAndRender();

$output58 .= '
		</div>
		<div class="col-sm-6">
			<div class="pull-right">
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments73 = array();
$arguments73['partial'] = 'List/UpdateFromTer';
$arguments73['section'] = NULL;
$arguments73['arguments'] = array (
);
$arguments73['optional'] = false;
$renderChildrenClosure74 = function() {return NULL;};

$output58 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments73, $renderChildrenClosure74, $renderingContext);

$output58 .= '
			</div>
		</div>
	</div>

	<div id="terTableWrapper">
		';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments75 = array();
// Rendering Boolean node
$arguments75['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean($currentVariableContainer->getOrNull('search'));
$arguments75['then'] = NULL;
$arguments75['else'] = NULL;
$renderChildrenClosure76 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output77 = '';

$output77 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments78 = array();
$renderChildrenClosure79 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output80 = '';

$output80 .= '
				<table id="terSearchTable" class="table table-striped table-hover typo3-extension-list">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments81 = array();
$arguments81['partial'] = 'List/TerTable';
// Rendering Array
$array82 = array();
$array82['paginatedExtensions'] = $currentVariableContainer->getOrNull('extensions');
$array82['availableAndInstalled'] = $currentVariableContainer->getOrNull('availableAndInstalled');
$arguments81['arguments'] = $array82;
$arguments81['section'] = NULL;
$arguments81['optional'] = false;
$renderChildrenClosure83 = function() {return NULL;};

$output80 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments81, $renderChildrenClosure83, $renderingContext);

$output80 .= '
				</table>
			';
return $output80;
};

$output77 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments78, $renderChildrenClosure79, $renderingContext);

$output77 .= '
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments84 = array();
$renderChildrenClosure85 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output86 = '';

$output86 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments87 = array();
$arguments87['partial'] = 'List/TerPaginator';
// Rendering Array
$array88 = array();
$array88['extensions'] = $currentVariableContainer->getOrNull('extensions');
$array88['showVersionList'] = $currentVariableContainer->getOrNull('showVersionList');
$array88['availableAndInstalled'] = $currentVariableContainer->getOrNull('availableAndInstalled');
$arguments87['arguments'] = $array88;
$arguments87['section'] = NULL;
$arguments87['optional'] = false;
$renderChildrenClosure89 = function() {return NULL;};

$output86 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments87, $renderChildrenClosure89, $renderingContext);

$output86 .= '
			';
return $output86;
};

$output77 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments84, $renderChildrenClosure85, $renderingContext);

$output77 .= '
		';
return $output77;
};
$arguments75['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output90 = '';

$output90 .= '
				<table id="terSearchTable" class="table table-striped table-hover typo3-extension-list">
					';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments91 = array();
$arguments91['partial'] = 'List/TerTable';
// Rendering Array
$array92 = array();
$array92['paginatedExtensions'] = $currentVariableContainer->getOrNull('extensions');
$array92['availableAndInstalled'] = $currentVariableContainer->getOrNull('availableAndInstalled');
$arguments91['arguments'] = $array92;
$arguments91['section'] = NULL;
$arguments91['optional'] = false;
$renderChildrenClosure93 = function() {return NULL;};

$output90 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments91, $renderChildrenClosure93, $renderingContext);

$output90 .= '
				</table>
			';
return $output90;
};
$arguments75['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output94 = '';

$output94 .= '
				';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments95 = array();
$arguments95['partial'] = 'List/TerPaginator';
// Rendering Array
$array96 = array();
$array96['extensions'] = $currentVariableContainer->getOrNull('extensions');
$array96['showVersionList'] = $currentVariableContainer->getOrNull('showVersionList');
$array96['availableAndInstalled'] = $currentVariableContainer->getOrNull('availableAndInstalled');
$arguments95['arguments'] = $array96;
$arguments95['section'] = NULL;
$arguments95['optional'] = false;
$renderChildrenClosure97 = function() {return NULL;};

$output94 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments95, $renderChildrenClosure97, $renderingContext);

$output94 .= '
			';
return $output94;
};

$output58 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments75, $renderChildrenClosure76, $renderingContext);

$output58 .= '
		<div class="splash-receivedata x-mask-loading">';
// Rendering ViewHelper TYPO3\CMS\Core\ViewHelpers\IconViewHelper
$arguments98 = array();
$arguments98['identifier'] = 'spinner-circle-dark';
$arguments98['size'] = 'small';
$arguments98['overlay'] = NULL;
$arguments98['state'] = 'default';
$arguments98['alternativeMarkupIdentifier'] = NULL;
$renderChildrenClosure99 = function() {return NULL;};

$output58 .= TYPO3\CMS\Core\ViewHelpers\IconViewHelper::renderStatic($arguments98, $renderChildrenClosure99, $renderingContext);

$output58 .= ' ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments100 = array();
$arguments100['key'] = 'extensionList.updateFromTer.label';
$arguments100['id'] = NULL;
$arguments100['default'] = NULL;
$arguments100['htmlEscape'] = NULL;
$arguments100['arguments'] = NULL;
$arguments100['extensionName'] = NULL;
$renderChildrenClosure101 = function() {return NULL;};

$output58 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments100, $renderChildrenClosure101, $renderingContext);

$output58 .= '</div>
	</div>

';
return $output58;
};

$output47 .= '';

$output47 .= '
';


return $output47;
}


}
#1507268210    28935     