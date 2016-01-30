<?php

/* AcmeFooterBundle:Default:index.html.twig */
class __TwigTemplate_9f14220ea7582fc967b78fe70bb04c89d1641472fcff21f840e66b8f139bff49 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "    ";
        $this->displayBlock('content', $context, $blocks);
    }

    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <h1 class=\"page-header\">Footer</h1>
                </div>
            </div>
            <!-- /.row -->
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <div class=\"panel panel-default\">
                        <div class=\"panel-heading\">
                                &nbsp;
                                <div style=\"float:left; margin-top:-15px;\" class=\"panel-heading\"><a href=\"";
        // line 15
        echo $this->env->getExtension('routing')->getPath("acme_footer_followus");
        echo "\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Follow Us</button></a></div>
                                <div style=\"float:left; margin-top:-15px;\" class=\"panel-heading\"><a href=\"";
        // line 16
        echo $this->env->getExtension('routing')->getPath("acme_footer_address");
        echo "\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Address</button></a></div>
                                <div style=\"float:left; margin-top:-15px;\" class=\"panel-heading\"><a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("acme_footer_whyus");
        echo "\"><button type=\"button\" class=\"btn btn-primary btn-sm\">Our Partners</button></a></div>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }

    public function getTemplateName()
    {
        return "AcmeFooterBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  317 => 164,  313 => 163,  297 => 159,  178 => 55,  244 => 214,  167 => 143,  174 => 105,  155 => 42,  192 => 77,  188 => 76,  184 => 75,  180 => 74,  206 => 21,  172 => 12,  150 => 6,  134 => 45,  90 => 32,  448 => 157,  439 => 150,  417 => 143,  397 => 130,  378 => 126,  363 => 119,  350 => 116,  345 => 115,  328 => 114,  321 => 109,  307 => 108,  299 => 106,  291 => 104,  288 => 103,  271 => 102,  231 => 79,  215 => 188,  207 => 69,  202 => 20,  198 => 62,  190 => 17,  186 => 57,  76 => 21,  380 => 293,  372 => 288,  361 => 280,  353 => 275,  342 => 267,  334 => 262,  323 => 254,  315 => 249,  304 => 241,  296 => 236,  277 => 223,  266 => 215,  210 => 22,  124 => 46,  137 => 51,  81 => 22,  104 => 37,  152 => 47,  97 => 30,  126 => 48,  77 => 22,  65 => 17,  58 => 16,  418 => 108,  358 => 118,  329 => 165,  301 => 160,  284 => 126,  280 => 125,  276 => 124,  272 => 123,  263 => 120,  257 => 117,  239 => 197,  233 => 104,  226 => 100,  213 => 97,  205 => 95,  197 => 93,  194 => 18,  185 => 113,  181 => 58,  161 => 84,  127 => 44,  118 => 99,  100 => 32,  165 => 85,  114 => 40,  110 => 37,  84 => 24,  23 => 2,  34 => 10,  129 => 42,  113 => 40,  70 => 30,  53 => 16,  20 => 2,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 147,  423 => 146,  413 => 141,  409 => 140,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 217,  384 => 121,  381 => 120,  379 => 119,  374 => 125,  368 => 122,  365 => 111,  362 => 110,  360 => 109,  355 => 117,  341 => 105,  337 => 103,  322 => 101,  314 => 99,  312 => 98,  309 => 162,  305 => 161,  298 => 91,  294 => 90,  285 => 228,  283 => 88,  278 => 86,  268 => 122,  264 => 84,  258 => 210,  252 => 85,  247 => 202,  241 => 109,  229 => 73,  220 => 70,  214 => 69,  177 => 88,  169 => 86,  140 => 55,  132 => 43,  128 => 74,  107 => 37,  61 => 15,  273 => 96,  269 => 94,  254 => 92,  243 => 88,  240 => 86,  238 => 85,  235 => 74,  230 => 79,  227 => 78,  224 => 71,  221 => 75,  219 => 76,  217 => 98,  208 => 68,  204 => 72,  179 => 69,  159 => 56,  143 => 53,  135 => 48,  119 => 40,  102 => 35,  71 => 19,  67 => 16,  63 => 21,  59 => 14,  87 => 31,  38 => 4,  26 => 2,  94 => 33,  89 => 32,  85 => 26,  75 => 25,  68 => 20,  56 => 16,  201 => 94,  196 => 90,  183 => 82,  171 => 61,  166 => 100,  163 => 62,  158 => 43,  156 => 8,  151 => 51,  142 => 79,  138 => 47,  136 => 40,  121 => 43,  117 => 42,  105 => 34,  91 => 28,  62 => 17,  49 => 43,  31 => 3,  28 => 2,  24 => 6,  25 => 4,  21 => 2,  19 => 1,  93 => 31,  88 => 27,  78 => 22,  46 => 10,  44 => 12,  27 => 5,  79 => 22,  72 => 20,  69 => 18,  47 => 12,  40 => 9,  37 => 8,  22 => 2,  246 => 90,  157 => 56,  145 => 54,  139 => 45,  131 => 44,  123 => 41,  120 => 41,  115 => 39,  111 => 38,  108 => 39,  101 => 61,  98 => 32,  96 => 32,  83 => 25,  74 => 20,  66 => 22,  55 => 14,  52 => 15,  50 => 13,  43 => 16,  41 => 4,  35 => 3,  32 => 3,  29 => 2,  209 => 96,  203 => 78,  199 => 67,  193 => 118,  189 => 91,  187 => 84,  182 => 56,  176 => 13,  173 => 87,  168 => 48,  164 => 10,  162 => 44,  154 => 59,  149 => 54,  147 => 87,  144 => 80,  141 => 48,  133 => 45,  130 => 44,  125 => 42,  122 => 35,  116 => 41,  112 => 40,  109 => 40,  106 => 36,  103 => 35,  99 => 34,  95 => 30,  92 => 35,  86 => 34,  82 => 23,  80 => 26,  73 => 22,  64 => 16,  60 => 17,  57 => 14,  54 => 15,  51 => 12,  48 => 11,  45 => 17,  42 => 9,  39 => 4,  36 => 15,  33 => 3,  30 => 9,);
    }
}