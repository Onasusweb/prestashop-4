<script type="text/javascript" src="{$aplazame_js_uri|escape:'htmlall':'UTF-8'}"></script>

<script>
aplazame.init({
    publicKey: "{$aplazame_public_key}",
    sandbox: "{if $aplazame_is_sandbox}true{else}false{/if}"
});
</script>
