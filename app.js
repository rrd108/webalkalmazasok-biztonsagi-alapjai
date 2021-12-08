// cart
const addToCartButtons = document.querySelectorAll('.addToCart')
const cartContent = document.querySelector('#cart ul')
const cartTotal = document.querySelector('#cartTotal')
const totalAmount = document.querySelector('#totalAmount')

const cart = document.querySelector('#cart')
const cartIcon = document.querySelector('#cartIcon')
const cartForm = document.querySelector('#cartForm')

cartIcon.addEventListener('mouseover', () => {
  cartForm.style.display = 'block'
})
cart.addEventListener('mouseleave', () => {
  cartForm.style.display = 'none'
})

addToCartButtons.forEach(button => {
  button.addEventListener('click', event => {
    productAdded = products.find(
      product => product.productId === event.target.dataset.id
    )

    cartContent.innerHTML += `<li>
        ${productAdded.name} - 1 db - ${new Intl.NumberFormat().format(
      productAdded.price
    )}
        <input type="hidden" name="productId[]" value="${
          productAdded.productId
        }">
        <input type="hidden" name="product[]" value="${productAdded.name}">
        <input type="hidden" name="price[]" value="${productAdded.price}">
    </li>`

    cartTotal.value = parseInt(cartTotal.value) + parseInt(productAdded.price)
    totalAmount.innerHTML = new Intl.NumberFormat().format(cartTotal.value)
    cartIcon.classList.add('dropin')
    setTimeout(() => cartIcon.classList.remove('dropin'), 500)
  })
})
