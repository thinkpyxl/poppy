const close = popup => ({ currentTarget }) => {
  if (! popup.classList.contains('peek--false')) {
    popup.classList.add('peek');
  }
}

export default close;