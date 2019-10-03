const { localStorage: storage } = window;

export default ({ slug = '' }) => {
  const response = storage.getItem(`poppy_${slug}_response`);

  return ({
    response: response,
    active: response === null
      ? true
      : false,
  })
}