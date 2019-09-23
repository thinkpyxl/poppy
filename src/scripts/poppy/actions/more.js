const more = popup => ({ currentTarget }) => {
  const {
    url = '',
    target = '',
  } = currentTarget.dataset;

  if (url) {
    if (target && target === '_blank') {
      const tab = window.open(url, target);
      tab.focus();
    }
  }
}

export default more;