<?php
class FluidCache_Standalone_partial_Media_Gallery_e885d6fb0be0e099f27ea95352933abf5bc52049 extends \TYPO3\CMS\Fluid\Core\Compiler\AbstractCompiledTemplate {

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
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments1 = array();
// Rendering Boolean node
$arguments1['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean($currentVariableContainer->getOrNull('files'));
$arguments1['then'] = NULL;
$arguments1['else'] = NULL;
$renderChildrenClosure2 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output3 = '';

$output3 .= '

        <div class="row" data-equalheight="container">
            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper
$arguments4 = array();
// Rendering Boolean node
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CountViewHelper
$arguments5 = array();
$arguments5['subject'] = NULL;
$renderChildrenClosure6 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
return $currentVariableContainer->getOrNull('files');
};
$arguments4['condition'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::evaluateComparator('>', TYPO3\CMS\Fluid\ViewHelpers\CountViewHelper::renderStatic($arguments5, $renderChildrenClosure6, $renderingContext), 1);
$arguments4['then'] = NULL;
$arguments4['else'] = NULL;
$renderChildrenClosure7 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output8 = '';

$output8 .= '
                ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper
$arguments9 = array();
$renderChildrenClosure10 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output11 = '';

$output11 .= '
                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments12 = array();
$arguments12['each'] = $currentVariableContainer->getOrNull('files');
$arguments12['as'] = 'file';
$arguments12['iteration'] = 'fileIteration';
$arguments12['key'] = '';
$arguments12['reverse'] = false;
$renderChildrenClosure13 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output14 = '';

$output14 .= '
                        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SwitchViewHelper
$arguments15 = array();
$arguments15['expression'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('data'), 'imagecols', $renderingContext);
$renderChildrenClosure16 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output17 = '';

$output17 .= '
                            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments18 = array();
$arguments18['value'] = '1';
$arguments18['default'] = false;
$renderChildrenClosure19 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output20 = '';

$output20 .= '
                                <div class="col-md-12" data-equalheight="item">
                                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments21 = array();
$arguments21['partial'] = 'Media/Type';
// Rendering Array
$array22 = array();
$array22['file'] = $currentVariableContainer->getOrNull('file');
$array22['data'] = $currentVariableContainer->getOrNull('data');
$array22['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments21['arguments'] = $array22;
$arguments21['section'] = NULL;
$arguments21['optional'] = false;
$renderChildrenClosure23 = function() {return NULL;};

$output20 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments21, $renderChildrenClosure23, $renderingContext);

$output20 .= '
                                </div>
                            ';
return $output20;
};

$output17 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments18, $renderChildrenClosure19, $renderingContext);

$output17 .= '
                            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments24 = array();
$arguments24['value'] = '2';
$arguments24['default'] = false;
$renderChildrenClosure25 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output26 = '';

$output26 .= '
                                <div class="col-sm-6" data-equalheight="item">
                                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments27 = array();
$arguments27['partial'] = 'Media/Type';
// Rendering Array
$array28 = array();
$array28['file'] = $currentVariableContainer->getOrNull('file');
$array28['data'] = $currentVariableContainer->getOrNull('data');
$array28['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments27['arguments'] = $array28;
$arguments27['section'] = NULL;
$arguments27['optional'] = false;
$renderChildrenClosure29 = function() {return NULL;};

$output26 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments27, $renderChildrenClosure29, $renderingContext);

$output26 .= '
                                </div>
                            ';
return $output26;
};

$output17 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments24, $renderChildrenClosure25, $renderingContext);

$output17 .= '
                            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments30 = array();
$arguments30['value'] = '3';
$arguments30['default'] = false;
$renderChildrenClosure31 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output32 = '';

$output32 .= '
                                <div class="col-md-4 col-sm-4 col-xs-4" data-equalheight="item">
                                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments33 = array();
$arguments33['partial'] = 'Media/Type';
// Rendering Array
$array34 = array();
$array34['file'] = $currentVariableContainer->getOrNull('file');
$array34['data'] = $currentVariableContainer->getOrNull('data');
$array34['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments33['arguments'] = $array34;
$arguments33['section'] = NULL;
$arguments33['optional'] = false;
$renderChildrenClosure35 = function() {return NULL;};

$output32 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments33, $renderChildrenClosure35, $renderingContext);

$output32 .= '
                                </div>
                            ';
return $output32;
};

$output17 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments30, $renderChildrenClosure31, $renderingContext);

$output17 .= '
                            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments36 = array();
$arguments36['value'] = '4';
$arguments36['default'] = false;
$renderChildrenClosure37 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output38 = '';

$output38 .= '
                                <div class="col-md-3 col-sm-3 col-xs-6" data-equalheight="item">
                                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments39 = array();
$arguments39['partial'] = 'Media/Type';
// Rendering Array
$array40 = array();
$array40['file'] = $currentVariableContainer->getOrNull('file');
$array40['data'] = $currentVariableContainer->getOrNull('data');
$array40['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments39['arguments'] = $array40;
$arguments39['section'] = NULL;
$arguments39['optional'] = false;
$renderChildrenClosure41 = function() {return NULL;};

$output38 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments39, $renderChildrenClosure41, $renderingContext);

$output38 .= '
                                </div>
                            ';
return $output38;
};

$output17 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments36, $renderChildrenClosure37, $renderingContext);

$output17 .= '
                            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments42 = array();
$arguments42['value'] = '6';
$arguments42['default'] = false;
$renderChildrenClosure43 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output44 = '';

$output44 .= '
                                <div class="col-md-2 col-sm-3 col-xs-4" data-equalheight="item">
                                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments45 = array();
$arguments45['partial'] = 'Media/Type';
// Rendering Array
$array46 = array();
$array46['file'] = $currentVariableContainer->getOrNull('file');
$array46['data'] = $currentVariableContainer->getOrNull('data');
$array46['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments45['arguments'] = $array46;
$arguments45['section'] = NULL;
$arguments45['optional'] = false;
$renderChildrenClosure47 = function() {return NULL;};

$output44 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments45, $renderChildrenClosure47, $renderingContext);

$output44 .= '
                                </div>
                            ';
return $output44;
};

$output17 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments42, $renderChildrenClosure43, $renderingContext);

$output17 .= '
                            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments48 = array();
// Rendering Boolean node
$arguments48['default'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments48['value'] = NULL;
$renderChildrenClosure49 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output50 = '';

$output50 .= '
                                <div class="col-md-12" data-equalheight="item">
                                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments51 = array();
$arguments51['partial'] = 'Media/Type';
// Rendering Array
$array52 = array();
$array52['file'] = $currentVariableContainer->getOrNull('file');
$array52['data'] = $currentVariableContainer->getOrNull('data');
$array52['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments51['arguments'] = $array52;
$arguments51['section'] = NULL;
$arguments51['optional'] = false;
$renderChildrenClosure53 = function() {return NULL;};

$output50 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments51, $renderChildrenClosure53, $renderingContext);

$output50 .= '
                                </div>
                            ';
return $output50;
};

$output17 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments48, $renderChildrenClosure49, $renderingContext);

$output17 .= '
                        ';
return $output17;
};

$output14 .= TYPO3\CMS\Fluid\ViewHelpers\SwitchViewHelper::renderStatic($arguments15, $renderChildrenClosure16, $renderingContext);

$output14 .= '
                    ';
return $output14;
};

$output11 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments12, $renderChildrenClosure13, $renderingContext);

$output11 .= '
                ';
return $output11;
};

$output8 .= TYPO3\CMS\Fluid\ViewHelpers\ThenViewHelper::renderStatic($arguments9, $renderChildrenClosure10, $renderingContext);

$output8 .= '
                ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper
$arguments54 = array();
$renderChildrenClosure55 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output56 = '';

$output56 .= '
                    <div class="col-md-12" data-equalheight="item">
                        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments57 = array();
$arguments57['partial'] = 'Media/Type';
// Rendering Array
$array58 = array();
$array58['file'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('files'), '0', $renderingContext);
$array58['data'] = $currentVariableContainer->getOrNull('data');
$array58['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments57['arguments'] = $array58;
$arguments57['section'] = NULL;
$arguments57['optional'] = false;
$renderChildrenClosure59 = function() {return NULL;};

$output56 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments57, $renderChildrenClosure59, $renderingContext);

$output56 .= '
                    </div>
                ';
return $output56;
};

$output8 .= TYPO3\CMS\Fluid\ViewHelpers\ElseViewHelper::renderStatic($arguments54, $renderChildrenClosure55, $renderingContext);

$output8 .= '
            ';
return $output8;
};
$arguments4['__thenClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output60 = '';

$output60 .= '
                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper
$arguments61 = array();
$arguments61['each'] = $currentVariableContainer->getOrNull('files');
$arguments61['as'] = 'file';
$arguments61['iteration'] = 'fileIteration';
$arguments61['key'] = '';
$arguments61['reverse'] = false;
$renderChildrenClosure62 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output63 = '';

$output63 .= '
                        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\SwitchViewHelper
$arguments64 = array();
$arguments64['expression'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('data'), 'imagecols', $renderingContext);
$renderChildrenClosure65 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output66 = '';

$output66 .= '
                            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments67 = array();
$arguments67['value'] = '1';
$arguments67['default'] = false;
$renderChildrenClosure68 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output69 = '';

$output69 .= '
                                <div class="col-md-12" data-equalheight="item">
                                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments70 = array();
$arguments70['partial'] = 'Media/Type';
// Rendering Array
$array71 = array();
$array71['file'] = $currentVariableContainer->getOrNull('file');
$array71['data'] = $currentVariableContainer->getOrNull('data');
$array71['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments70['arguments'] = $array71;
$arguments70['section'] = NULL;
$arguments70['optional'] = false;
$renderChildrenClosure72 = function() {return NULL;};

$output69 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments70, $renderChildrenClosure72, $renderingContext);

$output69 .= '
                                </div>
                            ';
return $output69;
};

$output66 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments67, $renderChildrenClosure68, $renderingContext);

$output66 .= '
                            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments73 = array();
$arguments73['value'] = '2';
$arguments73['default'] = false;
$renderChildrenClosure74 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output75 = '';

$output75 .= '
                                <div class="col-sm-6" data-equalheight="item">
                                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments76 = array();
$arguments76['partial'] = 'Media/Type';
// Rendering Array
$array77 = array();
$array77['file'] = $currentVariableContainer->getOrNull('file');
$array77['data'] = $currentVariableContainer->getOrNull('data');
$array77['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments76['arguments'] = $array77;
$arguments76['section'] = NULL;
$arguments76['optional'] = false;
$renderChildrenClosure78 = function() {return NULL;};

$output75 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments76, $renderChildrenClosure78, $renderingContext);

$output75 .= '
                                </div>
                            ';
return $output75;
};

$output66 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments73, $renderChildrenClosure74, $renderingContext);

$output66 .= '
                            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments79 = array();
$arguments79['value'] = '3';
$arguments79['default'] = false;
$renderChildrenClosure80 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output81 = '';

$output81 .= '
                                <div class="col-md-4 col-sm-4 col-xs-4" data-equalheight="item">
                                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments82 = array();
$arguments82['partial'] = 'Media/Type';
// Rendering Array
$array83 = array();
$array83['file'] = $currentVariableContainer->getOrNull('file');
$array83['data'] = $currentVariableContainer->getOrNull('data');
$array83['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments82['arguments'] = $array83;
$arguments82['section'] = NULL;
$arguments82['optional'] = false;
$renderChildrenClosure84 = function() {return NULL;};

$output81 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments82, $renderChildrenClosure84, $renderingContext);

$output81 .= '
                                </div>
                            ';
return $output81;
};

$output66 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments79, $renderChildrenClosure80, $renderingContext);

$output66 .= '
                            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments85 = array();
$arguments85['value'] = '4';
$arguments85['default'] = false;
$renderChildrenClosure86 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output87 = '';

$output87 .= '
                                <div class="col-md-3 col-sm-3 col-xs-6" data-equalheight="item">
                                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments88 = array();
$arguments88['partial'] = 'Media/Type';
// Rendering Array
$array89 = array();
$array89['file'] = $currentVariableContainer->getOrNull('file');
$array89['data'] = $currentVariableContainer->getOrNull('data');
$array89['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments88['arguments'] = $array89;
$arguments88['section'] = NULL;
$arguments88['optional'] = false;
$renderChildrenClosure90 = function() {return NULL;};

$output87 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments88, $renderChildrenClosure90, $renderingContext);

$output87 .= '
                                </div>
                            ';
return $output87;
};

$output66 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments85, $renderChildrenClosure86, $renderingContext);

$output66 .= '
                            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments91 = array();
$arguments91['value'] = '6';
$arguments91['default'] = false;
$renderChildrenClosure92 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output93 = '';

$output93 .= '
                                <div class="col-md-2 col-sm-3 col-xs-4" data-equalheight="item">
                                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments94 = array();
$arguments94['partial'] = 'Media/Type';
// Rendering Array
$array95 = array();
$array95['file'] = $currentVariableContainer->getOrNull('file');
$array95['data'] = $currentVariableContainer->getOrNull('data');
$array95['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments94['arguments'] = $array95;
$arguments94['section'] = NULL;
$arguments94['optional'] = false;
$renderChildrenClosure96 = function() {return NULL;};

$output93 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments94, $renderChildrenClosure96, $renderingContext);

$output93 .= '
                                </div>
                            ';
return $output93;
};

$output66 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments91, $renderChildrenClosure92, $renderingContext);

$output66 .= '
                            ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper
$arguments97 = array();
// Rendering Boolean node
$arguments97['default'] = TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\BooleanNode::convertToBoolean('1');
$arguments97['value'] = NULL;
$renderChildrenClosure98 = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output99 = '';

$output99 .= '
                                <div class="col-md-12" data-equalheight="item">
                                    ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments100 = array();
$arguments100['partial'] = 'Media/Type';
// Rendering Array
$array101 = array();
$array101['file'] = $currentVariableContainer->getOrNull('file');
$array101['data'] = $currentVariableContainer->getOrNull('data');
$array101['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments100['arguments'] = $array101;
$arguments100['section'] = NULL;
$arguments100['optional'] = false;
$renderChildrenClosure102 = function() {return NULL;};

$output99 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments100, $renderChildrenClosure102, $renderingContext);

$output99 .= '
                                </div>
                            ';
return $output99;
};

$output66 .= TYPO3\CMS\Fluid\ViewHelpers\CaseViewHelper::renderStatic($arguments97, $renderChildrenClosure98, $renderingContext);

$output66 .= '
                        ';
return $output66;
};

$output63 .= TYPO3\CMS\Fluid\ViewHelpers\SwitchViewHelper::renderStatic($arguments64, $renderChildrenClosure65, $renderingContext);

$output63 .= '
                    ';
return $output63;
};

$output60 .= TYPO3\CMS\Fluid\ViewHelpers\ForViewHelper::renderStatic($arguments61, $renderChildrenClosure62, $renderingContext);

$output60 .= '
                ';
return $output60;
};
$arguments4['__elseClosure'] = function() use ($renderingContext, $self) {
$currentVariableContainer = $renderingContext->getTemplateVariableContainer();
$output103 = '';

$output103 .= '
                    <div class="col-md-12" data-equalheight="item">
                        ';
// Rendering ViewHelper TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper
$arguments104 = array();
$arguments104['partial'] = 'Media/Type';
// Rendering Array
$array105 = array();
$array105['file'] = \TYPO3\CMS\Fluid\Core\Parser\SyntaxTree\ObjectAccessorNode::getPropertyPath($currentVariableContainer->getOrNull('files'), '0', $renderingContext);
$array105['data'] = $currentVariableContainer->getOrNull('data');
$array105['settings'] = $currentVariableContainer->getOrNull('settings');
$arguments104['arguments'] = $array105;
$arguments104['section'] = NULL;
$arguments104['optional'] = false;
$renderChildrenClosure106 = function() {return NULL;};

$output103 .= TYPO3\CMS\Fluid\ViewHelpers\RenderViewHelper::renderStatic($arguments104, $renderChildrenClosure106, $renderingContext);

$output103 .= '
                    </div>
                ';
return $output103;
};

$output3 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments4, $renderChildrenClosure7, $renderingContext);

$output3 .= '
        </div>

';
return $output3;
};

$output0 .= TYPO3\CMS\Fluid\ViewHelpers\IfViewHelper::renderStatic($arguments1, $renderChildrenClosure2, $renderingContext);

$output0 .= '
';


return $output0;
}


}
#1507522019    25789     