$(document).ready(() => {

    //Importar página HTML via Ajax para a aba documentação
    $('#documentation').on('click', ()=>{

        $('#pagina').load('documentacao.html')
    })
    //Importar página HTML via Ajax para a aba Suporte
    $('#support').on('click', ()=>{

        $('#pagina').load('suporte.html')
    })
    //requisitar informações de data via ajax para o back end 
    $('#competence').on('change',(e)=>{

        $.post('controller/controller.php',{

            date: $(e.target).val()

        })
        //imformações adquitiradas do back-end
        .done((data)=>{

            let datas = JSON.parse(data)
            $(datas).each((index, value)=>{

                $('#sellsNumber').html(value.sellNumbersMonth)

                $('#totalNumber').html(value.allSells)
                
                $('#activeCustomer').html(value.activeClientes)
                         
                $('#inactiveCustomer').html(value.inactiveClientes)
                
                $('#totalExpenses').html(value.totalExpenses)
             
            })

        })       
    })
})