function deleteTopic(id){
    var option = confirm('Do you want to delete this Topics?')	
    if (!option){
        return;
    }
    console.log(id)
    //ajax - xu ly lenh post
    $.post('topic/processDelete-topic.php',{
        'id':id,
        'action': 'delete'
    },function(data){
        location.reload()
    })
}