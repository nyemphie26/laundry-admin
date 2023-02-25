function updateStatus(link,status, assign){
    fetch(link,{
      method:'POST',
      headers: {
        Accept: 'application.json',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
          status: status,
          assign: assign,
        }
      )
    })
    .then(res=>res.json())
    .then(data=>{
      location.reload();
    })
    .catch(err=>console.log(err))
  }