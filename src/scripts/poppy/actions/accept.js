const { localStorage: storage } = window;

const accept = (popup, slug) => ({ currentTarget }) => {
  popup.classList.add('inactive');

  storage.setItem(`poppy_${slug}_response`, true);
}

export default accept;