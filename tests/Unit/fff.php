import { describe, it, expect, vi } from 'vitest';
import { render, screen } from '@testing-library/react';
import '@testing-library/jest-dom';

import axios from 'axios';
import Kanban from '../Kanban';

vi.mock('axios');

describe('Kanban Component', () => {
  it('renders kanban board with no tasks', async () => {
    axios.get.mockResolvedValue({ data: { tasks: [] } });
    render(<Kanban />);
    expect(screen.getByTestId('kanban-board')).toBeInTheDocument();
    expect(screen.getByTestId('task-list').children).toHaveLength(0);
  });

  it('renders kanban board with tasks', async () => {
    const tasks = ['Task 1', 'Task 2', 'Task 3'];
    axios.get.mockResolvedValue({ data: { tasks } });
    render(<Kanban />);
    const taskList = await screen.findByTestId('task-list');
    expect(taskList.children).toHaveLength(3);
    expect(screen.getByTestId('task-0')).toHaveTextContent('Task 1');
  });
});




