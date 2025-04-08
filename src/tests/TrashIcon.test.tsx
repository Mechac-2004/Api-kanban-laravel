import { describe, it, expect, vi } from 'vitest';
import '@testing-library/jest-dom';
import { render, screen } from '@testing-library/react';
import TrashIcon from '../components/TrashIcon';

describe('TrashIcon', () => {
  test('renders trash icon', () => {
    render(<TrashIcon />);
    expect(screen.getByRole('img', { name: /trash icon/i })).toBeInTheDocument();
  });
});
