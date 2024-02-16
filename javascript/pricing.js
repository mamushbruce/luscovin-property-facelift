function showContacts() {
    // Add your logic to display contacts menu
  }
  
  function showServiceForm() {
    var serviceForm = document.getElementById('service-form');
    serviceForm.classList.remove('hidden');
  }
  
  function clearForm() {
    var serviceForm = document.getElementById('service-form');
    serviceForm.classList.add('hidden');
    // Add logic to clear form fields
  }
  
  function agreeToTerms() {
    // Add your logic for agreeing to terms
  }

const getElement = (selector) => {
  const element = document.querySelector(selector)

  if (element) return element
  throw Error(
    `Please double check your class names, there is no ${selector} class`
  )
}

const links = getElement('.nav-links')
const navBtnDOM = getElement('.nav-btn')
//for the dropdown section
const price = getElement('.pricing-down')
const pricingBtnDOM = getElement('.pricing-btn')


navBtnDOM.addEventListener('click', () => {
  links.classList.toggle('show-links')
})

pricingBtnDOM.addEventListener('click', () => {
  price.classList.toggle('show-pricing')
})

const date = getElement('#date')
const currentYear = new Date().getFullYear()
date.textContent = currentYear



// const getElement = (selector) => {
//   const elements = document.querySelector(selector)

//   if (elements) return elements
//   throw Error(
//     `Please double check your class names, there is no ${selector} class`
//   )
// }
// //for the dropdown section
// const price = getElement('.pricing-down')
// const pricingBtnDOM = getElement('.pricing-btn')

// pricingBtnDOM.addEventListener('click', () => {
//   price.classList.toggle('show-pricing')
// })



  