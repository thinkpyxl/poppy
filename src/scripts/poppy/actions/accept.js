const accept = (popup, cookie) => ({ currentTarget }) => {
  popup.classList.add('inactive');

  if (cookie) {
    document.cookie = `${cookie.name}=true; expires=${cookie.expires}; path=/`;
  }

  window.setTimeout(
    () => popup.remove(),
    1000
  );
}

export default accept;