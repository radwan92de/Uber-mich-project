<?php
class FluidCache_Extensionmanager_UploadExtensionFile_action_form_7d8098a29c5543223b894cf7eddc8262d3b7c14d extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
$arguments1['enctype'] = 'multipart/form-data';
$arguments1['id'] = 'extensionUploadForm';
$arguments1['method'] = 'post';
$arguments1['controller'] = 'UploadExtensionFile';
$arguments1['action'] = 'extract';
$arguments1['additionalAttributes'] = NULL;
$arguments1['data'] = NULL;
$arguments1['arguments'] = array (
);
$arguments1['extensionName'] = NULL;
$arguments1['pluginName'] = NULL;
$arguments1['pageUid'] = NULL;
$arguments1['object'] = NULL;
$arguments1['pageType'] = 0;
$arguments1['noCache'] = false;
$arguments1['noCacheHash'] = false;
$arguments1['section'] = '';
$arguments1['format'] = '';
$arguments1['additionalParams'] = array (
);
$arguments1['absolute'] = false;
$arguments1['addQueryString'] = false;
$arguments1['argumentsToBeExcludedFromQueryString'] = array (
);
$arguments1['fieldNamePrefix'] = NULL;
$arguments1['actionUri'] = NULL;
$arguments1['objectName'] = NULL;
$arguments1['hiddenFieldClassName'] = NULL;
$arguments1['addQueryStringMethod'] = '';
$arguments1['name'] = NULL;
$arguments1['onreset'] = NULL;
$arguments1['onsubmit'] = NULL;
$arguments1['target'] = NULL;
$arguments1['class'] = NULL;
$arguments1['dir'] = NULL;
$arguments1['lang'] = NULL;
$arguments1['style'] = NULL;
$arguments1['title'] = NULL;
$arguments1['accesskey'] = NULL;
$arguments1['tabindex'] = NULL;
$arguments1['onclick'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output3 = '';

$output3 .= '
	<div class="control-group">
		<label for="extensionFile">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments4 = array();
$arguments4['key'] = 'uploadTemplate.extensionLabel';
$arguments4['id'] = NULL;
$arguments4['default'] = NULL;
$arguments4['htmlEscape'] = NULL;
$arguments4['arguments'] = NULL;
$arguments4['extensionName'] = NULL;
$renderChildrenClosure5 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments4, $renderChildrenClosure5, $renderingContext);

$output3 .= '
		</label>
		<div class="control">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\UploadViewHelper
$arguments6 = array();
$arguments6['name'] = 'extensionFile';
$arguments6['additionalAttributes'] = NULL;
$arguments6['data'] = NULL;
$arguments6['value'] = NULL;
$arguments6['property'] = NULL;
$arguments6['disabled'] = NULL;
$arguments6['multiple'] = NULL;
$arguments6['errorClass'] = 'f3-form-error';
$arguments6['class'] = NULL;
$arguments6['dir'] = NULL;
$arguments6['id'] = NULL;
$arguments6['lang'] = NULL;
$arguments6['style'] = NULL;
$arguments6['title'] = NULL;
$arguments6['accesskey'] = NULL;
$arguments6['tabindex'] = NULL;
$arguments6['onclick'] = NULL;
$renderChildrenClosure7 = function() {return NULL;};
$viewHelper8 = $self->getViewHelper('$viewHelper8', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\UploadViewHelper');
$viewHelper8->setArguments($arguments6);
$viewHelper8->setRenderingContext($renderingContext);
$viewHelper8->setRenderChildrenClosure($renderChildrenClosure7);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\UploadViewHelper

$output3 .= $viewHelper8->initializeArgumentsAndRender();

$output3 .= '
		</div>
	</div>

	<div class="control-group">
		<label for="extensionOverwrite">';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments9 = array();
$arguments9['key'] = 'extensionList.overwriteExtension';
$arguments9['id'] = NULL;
$arguments9['default'] = NULL;
$arguments9['htmlEscape'] = NULL;
$arguments9['arguments'] = NULL;
$arguments9['extensionName'] = NULL;
$renderChildrenClosure10 = function() {return NULL;};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments9, $renderChildrenClosure10, $renderingContext);

$output3 .= '</label>
		<div class="control">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\CheckboxViewHelper
$arguments11 = array();
$arguments11['name'] = 'overwrite';
$arguments11['id'] = 'extensionOverwrite';
$arguments11['value'] = '1';
$arguments11['additionalAttributes'] = NULL;
$arguments11['data'] = NULL;
$arguments11['checked'] = NULL;
$arguments11['multiple'] = false;
$arguments11['property'] = NULL;
$arguments11['disabled'] = NULL;
$arguments11['errorClass'] = 'f3-form-error';
$arguments11['class'] = NULL;
$arguments11['dir'] = NULL;
$arguments11['lang'] = NULL;
$arguments11['style'] = NULL;
$arguments11['title'] = NULL;
$arguments11['accesskey'] = NULL;
$arguments11['tabindex'] = NULL;
$arguments11['onclick'] = NULL;
$renderChildrenClosure12 = function() {return NULL;};
$viewHelper13 = $self->getViewHelper('$viewHelper13', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\CheckboxViewHelper');
$viewHelper13->setArguments($arguments11);
$viewHelper13->setRenderingContext($renderingContext);
$viewHelper13->setRenderChildrenClosure($renderChildrenClosure12);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\CheckboxViewHelper

$output3 .= $viewHelper13->initializeArgumentsAndRender();

$output3 .= '
		</div>
	</div>

	<div class="control-group">
		<div class="control">
			';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper
$arguments14 = array();
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper
$arguments15 = array();
$arguments15['key'] = 'uploadTemplate.uploadButton';
$arguments15['id'] = NULL;
$arguments15['default'] = NULL;
$arguments15['htmlEscape'] = NULL;
$arguments15['arguments'] = NULL;
$arguments15['extensionName'] = NULL;
$renderChildrenClosure16 = function() {return NULL;};
$arguments14['value'] = TYPO3\CMS\Fluid\ViewHelpers\TranslateViewHelper::renderStatic($arguments15, $renderChildrenClosure16, $renderingContext);
$arguments14['id'] = 'extensionUpload';
$arguments14['additionalAttributes'] = NULL;
$arguments14['data'] = NULL;
$arguments14['name'] = NULL;
$arguments14['property'] = NULL;
$arguments14['disabled'] = NULL;
$arguments14['class'] = NULL;
$arguments14['dir'] = NULL;
$arguments14['lang'] = NULL;
$arguments14['style'] = NULL;
$arguments14['title'] = NULL;
$arguments14['accesskey'] = NULL;
$arguments14['tabindex'] = NULL;
$arguments14['onclick'] = NULL;
$renderChildrenClosure17 = function() {return NULL;};
$viewHelper18 = $self->getViewHelper('$viewHelper18', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper');
$viewHelper18->setArguments($arguments14);
$viewHelper18->setRenderingContext($renderingContext);
$viewHelper18->setRenderChildrenClosure($renderChildrenClosure17);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\Form\SubmitViewHelper

$output3 .= $viewHelper18->initializeArgumentsAndRender();

$output3 .= '
		</div>
	</div>
';
return $output3;
};
$viewHelper19 = $self->getViewHelper('$viewHelper19', $renderingContext, 'TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper');
$viewHelper19->setArguments($arguments1);
$viewHelper19->setRenderingContext($renderingContext);
$viewHelper19->setRenderChildrenClosure($renderChildrenClosure2);
// End of ViewHelper TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper

$output0 .= $viewHelper19->initializeArgumentsAndRender();

$output0 .= '
';


return $output0;
}


}
#1507268342    8134      