const bebes = document.getElementById('bebes');

if (bebes) {
    bebes.addEventListener('click', e => {
    if (e.target.className === 'btn btn-danger delete-bebe') {
      if (confirm('Are you sure?')) {
        const id = e.target.getAttribute('data-id');

        fetch(`/bebe/delete/${id}`, {
          method: 'DELETE'
        }).then(res => window.location.reload());
      }
    }
  });
}
