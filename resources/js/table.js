if (window.location.pathname === '/') {
  document.getElementById('countryTable').addEventListener('click', tdOverviewClick)
  function tdOverviewClick (e) {
    if (!(e.target.tagName === 'TH' || e.target.tagName === 'SPAN')) {
      const itemid = e.target.parentElement.getAttribute('itemid')
      window.location.href = `/country/${itemid}`
    }
  }
}
