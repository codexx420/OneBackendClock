//{block name="backend/index/application"}
//{$smarty.block.parent}
//{include file="backend/index/one_backend_clock/view/main.js"}

function oneIntervalCheck() {
    setTimeout(function () {
        var arrBatchElems = Ext.ComponentQuery.query('one-backend-clock');
        if (arrBatchElems.length > 0) {
            Ext.Ajax.request
            ({
                url: '{url controller="OneBackendClockWidget" action="index"}',
                method: 'GET',
                success: function(response)
                {
                    console.log(response);
                    for(var i=0; i<arrBatchElems.length;i++) {
                        document.getElementById(arrBatchElems[i].body.dom.id).innerHTML = response.responseText;
                    }
                },
                failure: function(response)
                {
                    console.log(response.responseText);
                }

            });

        }

        oneIntervalCheck();
    }, 1000);
}

oneIntervalCheck();

//{/block}