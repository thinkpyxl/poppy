const { localStorage: storage } = window;

const dismiss = (popup, slug) => ({ currentTarget }) => {
  popup.classList.add('inactive');
  
  storage.setItem(`poppy_${slug}_response`, false);

  window.setTimeout(
    () => popup.remove(),
    300
  );
}

export default dismiss;