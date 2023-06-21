/**
   * Async function to get the data from the api
   * @returns - returns a promise
   */
async function getAPI (url) {
  try {
    const response = await fetch(url)
    const character = await response.json()
    return character
  } catch (err) {
    console.error('Error: ', err)
  }
}

async function index () {
  const domElement = document.getElementById('countryTable')
  const character = await getAPI('https://restcountries.com/v3.1/all?fields=flags,name,translations')
  const searchInput = document.getElementById('searchInput')
  searchInput.classList.remove('hidden')
  const loadingRow = document.getElementById('loadingRow')
  loadingRow.remove()
  searchInput.addEventListener('input', () => {
    const filteredCharacter = character.filter((element) => {
      const name = element.name.common.toLowerCase()
      const translations = Object.values(element.translations).flatMap((value) => Object.values(value).map((val) => val.toLowerCase()))
      const searchValue = searchInput.value.toLowerCase()
      return name.includes(searchValue) || translations.some((translation) => translation.includes(searchValue))
    })
    renderTable(filteredCharacter, domElement)
  })
  renderTable(character, domElement)
}

function renderTable (data, domElement) {
  domElement.innerHTML = ''
  const tr = document.createElement('tr')
  tr.setAttribute('class', 'bg-gray-200 text-gray-600 text-center uppercase text-sm leading-normal')
  tr.innerHTML = `
        <th class="py-3 px-6">Flag</th>
        <th class="py-3 px-6">Name</th>
        <th class="py-3 px-6">Official Name</th>
        `
  domElement.append(tr)
  data.forEach((element) => {
    const tr = document.createElement('tr')
    tr.setAttribute('itemid', element.name.common)
    tr.setAttribute('class', 'hover:bg-gray-300 border-b border-gray-200 py-10')
    tr.innerHTML = `
      <td class="border px-1 md:px-4 py-1 md:py-2" ><img src="${element.flags.png}" class="mx-auto h-10"></td>
      <td class="border px-1 md:px-4 py-1 md:py-2" >${element.name.common}</td>
      <td class="border px-1 md:px-4 py-1 md:py-2" >${element.name.official}</td>
      `
    domElement.append(tr)
  })
}

async function show () {
  const domElement = document.getElementById('information')
  const character = await getAPI(`https://restcountries.com/v3.1/name/${window.location.href.split('/').pop()}?fullText=true`)
  const loadingRow = document.getElementById('loading')
  loadingRow.remove()

  const divhead = document.createElement('div')
  const div = document.createElement('div')
  div.classList.add('flex', 'justify-between', 'w-full', 'h-full', 'mx-auto', 'p-4', 'bg-white', 'border-b', 'border-gray-300')
  div.innerHTML = `
    <span class="text-base md:text-6xl font-medium text-black my-auto">${character[0].name.official}</span>
    <span class="text-xs md:text-sm font-medium text-black my-auto"><img alt="${character[0].flags.alt}" src="${character[0].flags.png}"></span>`
  divhead.append(div)
  const div2 = document.createElement('div')
  div2.classList.add('flex', 'justify-between', 'w-full', 'h-full', 'mx-auto', 'p-4', 'bg-white')
  div2.innerHTML = `
    <span class="text-base md:text-xl font-medium text-black my-auto">Capital: ${character[0].capital === undefined ? 'None' : character[0].capital}</span>
    <span class="text-xs md:text-xl font-medium text-black my-auto">Continent: ${Object.values(character[0].continents)}</span>`
  divhead.append(div2)
  const div3 = document.createElement('div')
  div3.classList.add('flex', 'justify-between', 'w-full', 'h-full', 'mx-auto', 'p-4', 'bg-white')
  div3.innerHTML = `
    <span class="text-base md:text-xl font-medium text-black my-auto">Population: ${character[0].population}</span>
    <span class="text-xs md:text-xl font-medium text-black my-auto">Area: ${character[0].area} km2</span>`
  divhead.append(div3)
  if (character[0].coatOfArms !== undefined && character[0].coatOfArms.png !== undefined) {
    const div4 = document.createElement('div')
    div4.classList.add('flex', 'justify-between', 'w-full', 'h-full', 'mx-auto', 'p-4', 'bg-white')
    div4.innerHTML = `
    <span class="text-base md:text-xl font-medium text-black my-auto">Coat of Arms:</span>
    <span class="text-xs md:text-xl font-medium text-black my-auto"><img class="w-20" src="${character[0].coatOfArms.png}"></span>`
    divhead.append(div4)
  }
  if (character[0].languages !== undefined) {
    const div5 = document.createElement('div')
    div5.classList.add('flex', 'justify-between', 'w-full', 'h-full', 'mx-auto', 'p-4', 'bg-white')
    div5.innerHTML = `
    <span class="text-base md:text-xl font-medium text-black my-auto">Languages:</span>
    <span class="text-xs md:text-xl font-medium text-black my-auto">${Object.values(character[0].languages)}</span>`
    divhead.append(div5)
  }
  const div7 = document.createElement('div')
  div7.classList.add('flex', 'justify-between', 'w-full', 'h-full', 'mx-auto', 'p-4', 'bg-white')
  div7.innerHTML = `
    <span class="text-base md:text-xl font-medium text-black my-auto">Timezones:</span>
    <span class="text-xs md:text-xl font-medium text-black my-auto">${Object.values(character[0].timezones)}</span>`
  divhead.append(div7)
  const div8 = document.createElement('div')
  div8.classList.add('flex', 'justify-between', 'w-1/5', 'h-full', 'mx-auto', 'p-4', 'bg-white')
  div8.innerHTML = `
    <span class="text-base md:text-xl font-medium text-black my-auto">Map: </span>
    <span class="text-xs md:text-xl font-medium text-black my-auto"><a class="btn btn-default bg-transparent hover:bg-blue-500 text-blue-700 font-semibold relative hover:text-white py-2 px-4 mb-2 mx-auto border border-blue-500 hover:border-transparent rounded" href="${character[0].maps.googleMaps}" target="_blank">Click here</a></span>`
  divhead.append(div8)
  const div6 = document.createElement('div')
  div6.classList.add('flex', 'justify-between', 'w-full', 'h-full', 'mx-auto', 'p-4', 'bg-white')
  div6.innerHTML = `
    <ul class="text-base md:text-xl font-medium text-black my-auto">Translations:
    ${Object.values(character[0].translations).map((translation) => `<li>-  ${Object.values(translation)[1]}</li>`).join('')}
    </ul>
    `
  divhead.append(div6)

  domElement.append(divhead)
}

if (window.location.pathname === '/') {
  index()
} else if (window.location.pathname.split('/')[1] === 'country') {
  show()
}
