function updateStatus(link,status, assign, photo){
    fetch(link,{
      method:'POST',
      headers: {
        Accept: 'application.json',
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({
          status: status,
          assign: assign,
          photo: photo
        }
      )
    })
    .then(res=>res.json())
    .then(()=>location.reload())
    // .then(data=>console.log(data))
    .catch(err=>console.log(err))
  }