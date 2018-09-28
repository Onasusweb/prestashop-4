{*
 * This file is part of the official Aplazame module for PrestaShop.
 *
 * @author    Aplazame <soporte@aplazame.com>
 * @copyright 2015-2018 Aplazame
 * @license   see file: LICENSE
 *}

<style>
  iframe#aplazame{
    top:0;
  }
</style>
<div>
  <h3>{l s='Processing payment with Aplazame' mod='aplazame'}</h3>

  <script>
    aplazame.checkout("{$aid|escape:'htmlall':'UTF-8'}");
  </script>

  <iframe src="" style="position:fixed; top:0; left:0; bottom:0; right:0; width:100%; height:100%; border:none; margin:0; padding:0; overflow:hidden;">
      {l s='Tu navegador web no soporta IFrames. Por favor, actualiza el navegador o intenta usar otro más moderno.' mod='aplazame'}
  </iframe>
</div>
