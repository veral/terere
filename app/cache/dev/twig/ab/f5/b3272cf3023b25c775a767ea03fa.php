<?php

/* SensioDistributionBundle:Configurator:check.html.twig */
class __TwigTemplate_abf5b3272cf3023b25c775a767ea03fa extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SensioDistributionBundle::Configurator/layout.html.twig");

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SensioDistributionBundle::Configurator/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if (twig_length_filter($this->env, $this->getContext($context, "majors"))) {
            // line 5
            echo "        <h1>Major Problems that need to be fixed now</h1>
        <p>
            We have detected <strong>";
            // line 7
            echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getContext($context, "majors")), "html", null, true);
            echo "</strong> major problems.
            You <em>must</em> fix them before continuing:
        </p>
        <ol>
            ";
            // line 11
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "majors"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 12
                echo "                <li>";
                echo twig_escape_filter($this->env, $this->getContext($context, "message"), "html", null, true);
                echo "</li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 14
            echo "        </ol>
    ";
        }
        // line 16
        echo "
    ";
        // line 17
        if (twig_length_filter($this->env, $this->getContext($context, "minors"))) {
            // line 18
            echo "        <h1>Some Recommandations</h1>

        <p>
            ";
            // line 21
            if (twig_length_filter($this->env, $this->getContext($context, "majors"))) {
                // line 22
                echo "            Additionally, we
            ";
            } else {
                // line 24
                echo "            We
            ";
            }
            // line 26
            echo "            have detected some minor problems that we <em>recommend</em> you to fix to have a better Symfony
            experience:

            <ol>
                ";
            // line 30
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "minors"));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 31
                echo "                    <li>";
                echo twig_escape_filter($this->env, $this->getContext($context, "message"), "html", null, true);
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
            $context = array_merge($_parent, array_intersect_key($context, $_parent));
            // line 33
            echo "            </ol>
        </p>

    ";
        }
        // line 37
        echo "
    ";
        // line 38
        if ((!twig_length_filter($this->env, $this->getContext($context, "majors")))) {
            // line 39
            echo "        <ul class=\"symfony_list\">
            <li><a href=\"";
            // line 40
            echo twig_escape_filter($this->env, $this->getContext($context, "url"), "html", null, true);
            echo "\">Configure your Symfony Application online</a></li>
        </ul>
    ";
        }
    }

    public function getTemplateName()
    {
        return "SensioDistributionBundle:Configurator:check.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  796 => 475,  793 => 474,  782 => 472,  778 => 471,  774 => 469,  761 => 468,  735 => 463,  732 => 462,  713 => 460,  696 => 459,  692 => 457,  688 => 456,  684 => 455,  680 => 454,  676 => 453,  672 => 452,  668 => 451,  665 => 450,  663 => 449,  646 => 448,  635 => 447,  620 => 442,  615 => 440,  611 => 439,  608 => 438,  606 => 437,  592 => 436,  555 => 401,  537 => 398,  520 => 397,  517 => 396,  515 => 395,  510 => 393,  505 => 391,  201 => 94,  181 => 88,  170 => 85,  160 => 81,  153 => 77,  347 => 163,  329 => 154,  320 => 149,  313 => 145,  256 => 109,  232 => 93,  221 => 86,  213 => 82,  210 => 81,  205 => 78,  179 => 68,  165 => 60,  385 => 160,  382 => 159,  376 => 158,  367 => 156,  363 => 155,  359 => 153,  357 => 152,  354 => 151,  351 => 164,  349 => 149,  339 => 161,  336 => 145,  330 => 141,  317 => 135,  311 => 131,  308 => 130,  292 => 133,  289 => 120,  286 => 119,  284 => 118,  279 => 115,  277 => 114,  272 => 111,  270 => 110,  261 => 105,  251 => 101,  249 => 138,  244 => 97,  242 => 101,  237 => 93,  228 => 88,  225 => 87,  223 => 86,  218 => 85,  206 => 77,  204 => 95,  180 => 63,  159 => 53,  148 => 46,  191 => 74,  178 => 87,  175 => 86,  172 => 64,  134 => 54,  118 => 49,  344 => 162,  332 => 116,  327 => 153,  324 => 139,  321 => 112,  318 => 111,  315 => 110,  306 => 141,  303 => 128,  300 => 105,  291 => 102,  288 => 101,  274 => 97,  265 => 107,  263 => 113,  255 => 103,  243 => 92,  231 => 89,  212 => 79,  202 => 77,  190 => 68,  185 => 66,  174 => 59,  161 => 58,  34 => 5,  113 => 48,  104 => 36,  100 => 35,  348 => 322,  346 => 321,  343 => 320,  299 => 137,  297 => 104,  81 => 29,  77 => 25,  20 => 1,  65 => 17,  97 => 23,  63 => 18,  58 => 14,  59 => 13,  127 => 60,  110 => 38,  102 => 40,  90 => 42,  76 => 25,  53 => 17,  480 => 162,  474 => 161,  469 => 158,  461 => 155,  457 => 153,  453 => 151,  444 => 149,  440 => 148,  437 => 147,  435 => 146,  430 => 144,  427 => 143,  423 => 142,  413 => 134,  409 => 132,  407 => 131,  402 => 130,  398 => 129,  393 => 126,  387 => 122,  384 => 121,  381 => 120,  379 => 119,  374 => 157,  368 => 112,  365 => 111,  362 => 110,  360 => 167,  355 => 106,  341 => 147,  337 => 160,  322 => 138,  314 => 99,  312 => 109,  309 => 108,  305 => 129,  298 => 125,  294 => 90,  285 => 129,  283 => 100,  278 => 125,  268 => 85,  264 => 84,  258 => 94,  252 => 80,  247 => 78,  241 => 77,  235 => 85,  229 => 92,  224 => 81,  220 => 70,  214 => 69,  208 => 68,  177 => 65,  169 => 60,  143 => 43,  140 => 42,  132 => 48,  128 => 49,  119 => 40,  107 => 37,  38 => 7,  71 => 23,  155 => 56,  135 => 49,  126 => 47,  114 => 42,  84 => 40,  70 => 15,  67 => 18,  61 => 17,  196 => 90,  183 => 82,  171 => 58,  166 => 56,  163 => 82,  158 => 80,  156 => 62,  151 => 47,  142 => 51,  138 => 50,  136 => 71,  121 => 50,  117 => 43,  105 => 18,  91 => 33,  62 => 16,  49 => 12,  87 => 41,  31 => 4,  26 => 3,  94 => 38,  89 => 29,  85 => 24,  75 => 23,  68 => 30,  56 => 11,  21 => 2,  28 => 3,  24 => 2,  25 => 35,  19 => 1,  93 => 31,  88 => 30,  78 => 24,  46 => 13,  44 => 20,  27 => 3,  79 => 18,  72 => 21,  69 => 20,  47 => 21,  40 => 11,  37 => 7,  22 => 2,  246 => 32,  157 => 56,  145 => 74,  139 => 49,  131 => 45,  123 => 61,  120 => 44,  115 => 40,  111 => 40,  108 => 19,  101 => 33,  98 => 45,  96 => 37,  83 => 27,  74 => 22,  66 => 19,  55 => 13,  52 => 12,  50 => 22,  43 => 12,  41 => 19,  35 => 6,  32 => 6,  29 => 5,  209 => 78,  203 => 78,  199 => 76,  193 => 92,  189 => 73,  187 => 89,  182 => 66,  176 => 64,  173 => 74,  168 => 84,  164 => 59,  162 => 54,  154 => 60,  149 => 51,  147 => 75,  144 => 53,  141 => 73,  133 => 55,  130 => 39,  125 => 51,  122 => 41,  116 => 57,  112 => 39,  109 => 52,  106 => 51,  103 => 25,  99 => 30,  95 => 34,  92 => 31,  86 => 28,  82 => 26,  80 => 27,  73 => 24,  64 => 23,  60 => 16,  57 => 16,  54 => 13,  51 => 12,  48 => 11,  45 => 11,  42 => 8,  39 => 6,  36 => 5,  33 => 4,  30 => 3,);
    }
}
