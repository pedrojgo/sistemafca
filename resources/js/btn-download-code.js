document.addEventListener('DOMContentLoaded', function() {
    const buttons = document.querySelectorAll('.download-button-code');

    buttons.forEach(button => {
        button.addEventListener('click', function() {
            const parameter = this.getAttribute('data-param-id-user');
            const file = this.getAttribute('data-para-name');
   
            downloadBarcode(parameter,file)
        });
    });
});

function downloadBarcode(param, file) {
     const url = `/student/${encodeURIComponent(param)}`;

     fetch(url, {
         method: 'GET',
         headers: {
             'X-Requested-With': 'XMLHttpRequest',
             'Accept': 'application/json',
         }
     })
     .then(response => response.blob())
     .then(blob => {
         const url = window.URL.createObjectURL(blob);
         const a = document.createElement('a');
         a.href = url;
         a.download = file+'.png'; 
         document.body.appendChild(a);
         a.click();
         a.remove();
         window.URL.revokeObjectURL(url); 
     })
     .catch(error => console.error('Error:', error));
}
