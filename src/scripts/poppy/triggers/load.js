const load = (args, popup) => {
  window.addEventListener(
    'load',
    ev => popup.classList.remove('inactive')
  );
}

export default load;