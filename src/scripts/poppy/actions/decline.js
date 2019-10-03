const { localStorage: storage } = window;

const dismiss = (popup, slug) => ({ currentTarget }) => {
  popup.classList.add('inactive');
  
  storage.setItem(`poppy_${slug}_response`, false);
}

export default dismiss;